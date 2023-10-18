<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index_view()
    {
        $data = Contact::orderBy('id', 'DESC')->get();
        return view('contact.index', compact('data'));
    }

    public function create_view()
    {
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('contact.create', compact('patients'));
    }

    public function update_view($id)
    {
        $data = Contact::findorfail($id);
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('contact.update', compact('data', 'patients'));
    }

    public function create_action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient' => ['required', 'integer'],
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

        Contact::create([
            'patient' => $request->patient,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
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

        Contact::findorfail($id)->update([
            'patient' => $request->patient,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function delete_action(Request $request, $id)
    {
        Contact::findorfail($id)->delete();
        $redirect =  Redirect::route('views.contacts.index');
        if ($request->get('origin')) $redirect = Redirect::to(Redirect::back()->getTargetUrl() . '#contacts');
        return $redirect->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
