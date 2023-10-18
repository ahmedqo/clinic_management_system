<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index_view()
    {
        $data = Invoice::orderBy('id', 'DESC')->get();
        return view('invoice.index', compact('data'));
    }

    public function summary_view($id)
    {
        $data = Invoice::findorfail($id);
        return view('invoice.summary', compact('data'));
    }

    public function create_view()
    {
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('invoice.create', compact('patients'));
    }

    public function update_view($id)
    {
        $data = Invoice::findorfail($id);
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('invoice.update', compact('data', 'patients'));
    }

    public function create_action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient' => ['required', 'integer'],
            'payment' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        if (!$request->items_content) {
            return Redirect::back()->withInput()->with([
                'message' => __('Atleast one invoice item is required'),
                'type' => 'error'
            ]);
        }

        $current = Invoice::create([
            'patient' => $request->patient,
            'payment' => $request->payment,
            'note' => $request->note,
        ]);

        foreach ($request->items_content as $key => $value) {
            InvoiceItem::create([
                'invoice' => $current->id,
                'content' => $request->items_content[$key],
                'cost' => $request->items_cost[$key],
            ]);
        }

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function update_action(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'patient' => ['required', 'integer'],
            'payment' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $current = Invoice::findorfail($id);
        if ($request->items_remove && !$request->items_content) {
            if ($current->items()->count() - count($request->items_remove) <= 0) {
                return Redirect::back()->withInput()->with([
                    'message' => __('Atleast one invoice item is required'),
                    'type' => 'error'
                ]);
            }
        }

        $current->update([
            'patient' => $request->patient,
            'payment' => $request->payment,
            'note' => $request->note,
        ]);

        if ($request->items_content) {
            foreach ($request->items_content as $key => $value) {
                InvoiceItem::create([
                    'invoice' => $current->id,
                    'content' => $request->items_content[$key],
                    'cost' => $request->items_cost[$key],
                ]);
            }
        }

        if ($request->items_remove) {
            foreach ($request->items_remove as $item) {
                InvoiceItem::findorfail($item)->delete();
            }
        }

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function delete_action(Request $request, $id)
    {
        Invoice::findorfail($id)->delete();
        $redirect =  Redirect::route('views.invoices.index');
        if ($request->get('origin')) $redirect = Redirect::to(Redirect::back()->getTargetUrl() . '#invoices');
        return $redirect->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
