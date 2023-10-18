<?php

namespace App\Http\Controllers;

use App\Functions\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function login_view()
    {
        return view('auth.login');
    }

    public function blank_view()
    {
        return view('auth.blank');
    }

    public function reset_view($token)
    {
        return view('auth.reset', compact('token'));
    }

    public function login_action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return Redirect::route('views.dashboard.index');
        }

        return Redirect::back()->withInput()->with([
            'message' => __('Invalid login details'),
            'type' => 'error'
        ]);
    }

    public function blank_action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        if (!Mail::forgot($request->email)) {
            return Redirect::back()->withInput()->with([
                'message' => __('The user does not exist'),
                'type' => 'error'
            ]);
        }

        return Redirect::back()->with([
            'message' => __('Please check your email for password reset instructions'),
            'type' => 'success'
        ]);
    }

    public function reset_action(Request $request, $token)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => ['required', 'string'],
            'confirm_password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->with([
                'message' => $validator->errors()->all(),
                'type' => 'error'
            ]);
        }

        $row = DB::table('password_resets')->where('token', $token)->first();

        if (!$row) {
            return Redirect::back()->withInput()->with([
                'message' => __('The link is invalid'),
                'type' => 'error'
            ]);
        }

        $user = User::where('email', $row->email)->first();

        if (!$user) {
            return Redirect::back()->withInput()->with([
                'message' => __('The user does not exist'),
                'type' => 'error'
            ]);
        }

        if ($request->new_password != $request->confirm_password) {
            return Redirect::back()->withInput()->with([
                'message' => __('Confirm password missmatch'),
                'type' => 'error'
            ]);
        }

        DB::table('password_resets')->where('token', $token)->delete();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return Redirect::route("views.login.index")->with([
            'message' => __('Changed successfully'),
            'type' => 'success'
        ]);
    }

    public function logout_action()
    {
        Auth::logout();

        return Redirect::route("views.login.index")->with([
            'message' => __('Logout successfully'),
            'type' => 'success'
        ]);
    }
}
