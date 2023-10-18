<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index_view()
    {
        $data = Patient::orderBy('id', 'DESC')->get();
        return view('patient.index', compact('data'));
    }

    public function summary_view($id)
    {
        $data = Patient::findorfail($id);
        return view('patient.summary', compact('data'));
    }

    public function create_view()
    {
        return view('patient.create');
    }

    public function update_view($id)
    {
        $data = Patient::findorfail($id);
        return view('patient.update', compact('data'));
    }

    public function create_action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Patient::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'nationality' => $request->nationality,
            'identity' => $request->identity,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'zipcode' => $request->zipcode,
            'insurance_provider' => $request->insurance_provider,
            'insurance_number' => $request->insurance_number,
        ]);

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function update_action(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        Patient::findorfail($id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'nationality' => $request->nationality,
            'identity' => $request->identity,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'zipcode' => $request->zipcode,
            'insurance_provider' => $request->insurance_provider,
            'insurance_number' => $request->insurance_number,
        ]);

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function delete_action($id)
    {
        Patient::findorfail($id)->delete();

        return Redirect::route('views.patients.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
