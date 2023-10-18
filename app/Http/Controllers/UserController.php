<?php

namespace App\Http\Controllers;

use App\Functions\Mail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function index_view()
    {
        $data = User::orderBy('id', 'DESC')->get();
        return view('user.index', compact('data'));
    }

    public function create_view()
    {
        return view('user.create');
    }

    public function update_view($id)
    {
        $data = User::findorfail($id);
        return view('user.update', compact('data'));
    }

    public function status_action(Request $request, $id)
    {
        $current = User::findorfail($id);
        $current->status = !$current->status;
        $current->save();
    }

    public function create_action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'identity' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'string', 'unique:users'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        User::create($request->merge(['password' =>  Hash::make(Str::random(20))])->all());

        Mail::forgot($request->email);
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
            'identity' => ['required', 'string', 'unique:users,identity,' . $id],
            'email' => ['required', 'email', 'unique:users,email,' . $id],
            'phone' => ['required', 'string', 'unique:users,phone,' . $id],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        User::findorfail($id)->update($request->all());

        return Redirect::back()->with([
            'message' => __('Updated successfully'),
            'type' => 'success'
        ]);
    }

    public function delete_action($id)
    {
        User::findorfail($id)->delete();

        return Redirect::route('views.users.index')->with([
            'message' => __('Deleted successfully'),
            'type' => 'success'
        ]);
    }
}
