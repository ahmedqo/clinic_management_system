<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Prescription;
use App\Models\PrescriptionItem;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index_view()
    {
        $data = Prescription::orderBy('id', 'DESC')->get();
        return view('prescription.index', compact('data'));
    }

    public function summary_view($id)
    {
        $data = Prescription::findorfail($id);
        return view('prescription.summary', compact('data'));
    }

    public function create_view()
    {
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('prescription.create', compact('patients'));
    }

    public function update_view($id)
    {
        $data = Prescription::findorfail($id);
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('prescription.update', compact('data', 'patients'));
    }

    public function create_action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        if (!$request->items_content) {
            return Redirect::back()->withInput()->with([
                'message' => __('Atleast one prescription item is required'),
                'type' => 'error'
            ]);
        }

        $current = Prescription::create([
            'patient' => $request->patient,
            'note' => $request->note,
        ]);

        foreach ($request->items_content as $key => $value) {
            PrescriptionItem::create([
                'prescription' => $current->id,
                'content' => $request->items_content[$key],
                'type' => $request->items_type[$key],
                'note' => $request->items_note[$key],
            ]);
        }

        return Redirect::route('views.prescriptions.summary', [
            'id' => $current->id,
            'print' => 'true'
        ])->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function update_action(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'patient' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $current = Prescription::findorfail($id);
        if ($request->items_remove && !$request->items_content) {
            if ($current->items()->count() - count($request->items_remove) <= 0) {
                return Redirect::back()->withInput()->with([
                    'message' => __('Atleast one prescription item is required'),
                    'type' => 'error'
                ]);
            }
        }

        $current->update([
            'patient' => $request->patient,
            'note' => $request->note,
        ]);

        if ($request->items_content) {
            foreach ($request->items_content as $key => $value) {
                PrescriptionItem::create([
                    'prescription' => $current->id,
                    'content' => $request->items_content[$key],
                    'type' => $request->items_type[$key],
                    'note' => $request->items_note[$key],
                ]);
            }
        }

        if ($request->items_remove) {
            foreach ($request->items_remove as $item) {
                PrescriptionItem::findorfail($item)->delete();
            }
        }

        return Redirect::route('views.prescriptions.summary', [
            'id' => $current->id,
            'print' => 'true'
        ])->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function delete_action(Request $request, $id)
    {
        Prescription::findorfail($id)->delete();
        $redirect =  Redirect::route('views.prescriptions.index');
        if ($request->get('origin')) $redirect = Redirect::to(Redirect::back()->getTargetUrl() . '#prescriptions');
        return $redirect->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
