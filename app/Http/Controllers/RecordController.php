<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index_view()
    {
        $data = Record::orderBy('id', 'DESC')->get();
        return view('record.index', compact('data'));
    }

    public function create_view()
    {
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('record.create', compact('patients'));
    }

    public function update_view($id)
    {
        $data = Record::findorfail($id);
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('record.update', compact('data', 'patients'));
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

        Record::create([
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

        Record::findorfail($id)->update([
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
        Record::findorfail($id)->delete();
        $redirect =  Redirect::route('views.records.index');
        if ($request->get('origin')) $redirect = Redirect::to(Redirect::back()->getTargetUrl() . '#records');
        return $redirect->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
