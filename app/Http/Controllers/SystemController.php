<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Models\Appointment;
use App\Models\Event;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\System;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class SystemController extends Controller
{
    public function dashboard_view()
    {
        $patients = Patient::orderBy('id', 'DESC')->get();
        $slot = Core::system()->report;
        $patientCount = 0;
        $appointmentCount = 0;
        $revenue = 0;
        $registry = 0;
        switch ($slot) {
            case "day":
                $currentDate = Carbon::now()->toDateString();

                $patientCount = Patient::whereDate('created_at', $currentDate)->get()->count();
                $appointmentCount = Appointment::whereDate('date', $currentDate)->get()->count();
                foreach (Invoice::whereDate('created_at', $currentDate)->get() as $item)
                    $revenue += $item->items()->sum('cost');
                foreach (Invoice::where('payment', 'cash')->whereDate('created_at', $currentDate)->get() as $item)
                    $registry += $item->items()->sum('cost');
                break;
            case "week":
                $startOfWeek = Carbon::now()->startOfWeek()->subDay();
                $endOfWeek = Carbon::now()->endOfWeek()->subDay();

                $patientCount = Patient::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get()->count();
                $appointmentCount = Appointment::whereBetween('date', [$startOfWeek, $endOfWeek])->get()->count();
                foreach (Invoice::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get() as $item)
                    $revenue += $item->items()->sum('cost');
                foreach (Invoice::where('payment', 'cash')->whereBetween('created_at', [$startOfWeek, $endOfWeek])->get() as $item)
                    $registry += $item->items()->sum('cost');
                break;
            case "month":
                $startOfMonth = Carbon::now()->startOfMonth();
                $endOfMonth = Carbon::now()->endOfMonth();

                $patientCount = Patient::whereBetween('created_at', [$startOfMonth, $endOfMonth])->get()->count();
                $appointmentCount = Appointment::whereBetween('date', [$startOfMonth, $endOfMonth])->get()->count();
                foreach (Invoice::whereBetween('created_at', [$startOfMonth, $endOfMonth])->get() as $item)
                    $revenue += $item->items()->sum('cost');
                foreach (Invoice::where('payment', 'cash')->whereBetween('created_at', [$startOfMonth, $endOfMonth])->get() as $item)
                    $registry += $item->items()->sum('cost');
                break;
        }

        $events = Event::orderBy('id', 'DESC')->get()->map(function ($item) {
            return [
                'start' => $item->start_date . 'T' .  $item->start_time,
                'end' => $item->end_date . 'T' .  $item->end_time,
                'title' => __($item->type),
                'color' => '#60a5fa',
                'groupId' => 'event',
                'url' => route('views.events.update', $item->id),
            ];
        });
        $appointments =  Appointment::orderBy('id', 'DESC')->get()->map(function ($item) {
            return [
                'start' => $item->date . 'T' .  $item->time,
                'end' => $item->date . 'T' . Carbon::parse($item->time)->addMinutes(Core::system()->slot)->format('H:i:s'),
                'title' => strtoupper($item->patient()->last_name) . ' ' . ucfirst($item->patient()->first_name),
                'color' => $item->status == 'canceled' ? '#fca5a5' : ($item->status == 'pending' ? '#fcd34d' : '#6ee7b7'),
                'groupId' => 'appointment',
                'url' => route('views.appointments.update', $item->id),
            ];
        });
        $calendar = array_merge($events->all(), $appointments->all());

        return view('system.dashboard', compact('patientCount', 'appointmentCount', 'revenue', 'registry', 'patients', 'calendar'));
    }

    public function appointment_action(Request $request)
    {
        $patient = $request->patient;
        $validation = $patient == 'new' ? [
            'patient' => ['required', 'string'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i:s'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ] : [
            'patient' => ['required', 'integer'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i:s'],
        ];
        $validator = Validator::make($request->all(), $validation);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }
        if ($patient == 'new') {
            $patient = Patient::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
            ])->id;
        }

        Appointment::create([
            'patient' => $patient,
            'date' => $request->date,
            'time' => $request->time,
            'note' => $request->note,
        ]);

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function index_view()
    {
        $data = System::first();
        return view('system.index', compact('data'));
    }

    public function update_action(Request $request)
    {
        System::first()->update([
            'cost' => $request->cost,
            'currency' => $request->currency,
            'slot' => $request->slot,
            'work_days' => implode(',', $request->work_days),
            'work_start' => $request->work_start,
            'work_end' => $request->work_end,
            'break_start' => $request->break_start,
            'break_end' => $request->break_end,
            'report' => $request->report,
        ]);

        return Redirect::back()->with([
            'message' => __('Changed successfully'),
            'type' => 'success'
        ]);
    }
}
