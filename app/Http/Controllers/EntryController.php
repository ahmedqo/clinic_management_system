<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function index_view()
    {
        $data = Entry::orderBy('id', 'DESC')->get();
        return view('entry.index', compact('data'));
    }

    public function create_view()
    {
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('entry.create', compact('patients'));
    }

    public function update_view($id)
    {
        $data = Entry::findorfail($id);
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('entry.update', compact('data', 'patients'));
    }

    public function create_action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient' => ['required', 'integer'],
            'type' => ['required', 'string'],
            'content' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Entry::create([
            'patient' => $request->patient,
            'type' => $request->type,
            'content' => $request->content,
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
            'type' => ['required', 'string'],
            'content' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Entry::findorfail($id)->update([
            'patient' => $request->patient,
            'type' => $request->type,
            'content' => $request->content,
        ]);

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function delete_action(Request $request, $id)
    {
        Entry::findorfail($id)->delete();
        $redirect =  Redirect::route('views.entries.index');
        if ($request->get('origin')) $redirect = Redirect::to(Redirect::back()->getTargetUrl() . '#entries');
        return $redirect->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
