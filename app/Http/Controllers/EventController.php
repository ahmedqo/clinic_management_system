<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index_view()
    {
        $data = Event::orderBy('id', 'DESC')->get();
        return view('event.index', compact('data'));
    }

    public function create_view()
    {
        return view('event.create');
    }

    public function update_view($id)
    {
        $data = Event::findorfail($id);
        return view('event.update', compact('data'));
    }

    public function create_action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'start_time' => ['required', 'date_format:H:i:s'],
            'end_date' => ['required', 'date'],
            'end_time' => ['required', 'date_format:H:i:s'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Event::create([
            'type' => $request->type,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'end_date' => $request->end_date,
            'end_time' => $request->end_time,
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
            'type' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'start_time' => ['required', 'date_format:H:i:s'],
            'end_date' => ['required', 'date'],
            'end_time' => ['required', 'date_format:H:i:s'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Event::findorfail($id)->update([
            'type' => $request->type,
            'start_date' => $request->start_date,
            'start_time' => $request->start_time,
            'end_date' => $request->end_date,
            'end_time' => $request->end_time,
            'note' => $request->note,
        ]);

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function delete_action($id)
    {
        Event::findorfail($id)->delete();

        return Redirect::route('views.events.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
