<?php

namespace App\Http\Controllers;

use App\Functions\Core;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index_view()
    {
        $data = Appointment::orderBy('id', 'DESC')->get();
        return view('appointment.index', compact('data'));
    }

    public function create_view()
    {
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('appointment.create', compact('patients'));
    }

    public function update_view($id)
    {
        $data = Appointment::findorfail($id);
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('appointment.update', compact('data', 'patients'));
    }

    public function create_action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient' => ['required', 'integer'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i:s'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Appointment::create([
            'patient' => $request->patient,
            'date' => $request->date,
            'time' => $request->time,
            'note' => $request->note,
        ]);

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function update_action(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'patient' => ['required', 'integer'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i:s'],
            'status' =>  ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $current = Appointment::findorfail($id);
        $status = $current->status;

        $current->update([
            'patient' => $request->patient,
            'date' => $request->date,
            'time' => $request->time,
            'note' => $request->note,
            'status' => $request->status,
        ]);

        $end = Core::status()[2];
        if ($request->status == $end &&  $status != $end) {
            return Redirect::route('views.invoices.create', [
                'patient' => $request->patient
            ]);
        } else {
            return Redirect::back()->with([
                'message' => __('Updated successfully'),
                'type' => 'success'
            ]);
        }
    }

    public function delete_action(Request $request, $id)
    {
        Appointment::findorfail($id)->delete();
        $redirect =  Redirect::route('views.appointments.index');
        if ($request->get('origin')) $redirect = Redirect::to(Redirect::back()->getTargetUrl() . '#appointments');
        return $redirect->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
