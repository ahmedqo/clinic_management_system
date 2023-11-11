<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function upload($patient, $category, $docs)
    {
        foreach ($docs as $doc) {
            $name = substr(Storage::putFile('public/documents', $doc), strlen('public/documents/'));
            $orgn =  $doc->getClientOriginalName();
            $type = $doc->getClientMimeType();
            $size = $doc->getSize();

            Document::create([
                'patient' => $patient,
                'type' => $category,
                //'origin' => $orgn,
                'name' => $name,
                'mime' => $type,
                'size' => $size
            ]);
        }
    }

    public function index_view()
    {
        $data = Document::orderBy('id', 'DESC')->get();
        return view('document.index', compact('data'));
    }

    public function create_view()
    {
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('document.create', compact('patients'));
    }

    public function summary_view($id)
    {
        $data = Document::findorfail($id);
        return view('document.summary', compact('data'));
    }

    public function create_action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient' => ['required', 'integer'],
            'type' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        if (!$request->hasFile('documents')) {
            return Redirect::back()->withInput()->with([
                'message' => __('Atleast one document is required'),
                'type' => 'error'
            ]);
        }

        $this->upload($request->patient, $request->type, $request->file('documents'));

        return Redirect::back()->with([
            'message' => __('Created successfully'),
            'type' => 'success'
        ]);
    }

    public function delete_action(Request $request, $id)
    {
        $current = Document::findorfail($id);
        if (Storage::exists('public/documents/' . $current->name))
            Storage::delete('public/documents/' . $current->name);
        $current->delete();
        $redirect =  Redirect::route('views.documents.index');
        if ($request->get('origin')) $redirect = Redirect::to(Redirect::back()->getTargetUrl() . '#documents');
        return $redirect->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
