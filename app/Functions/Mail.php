<?php

namespace App\Functions;

use Illuminate\Support\Facades\{
    Mail as Mailer,
    DB,
};
use App\Mail\{
    ContactMail,
    ResetMail
};
use Illuminate\Support\Str;
use App\Models\User;


class Mail
{
    public static function forgot($email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return false;
        }

        $token = Str::random(20);

        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
        ]);

        $mail = new ResetMail(['token' => $token]);

        Mailer::to($user->email)->send($mail);
        return true;
    }

    // public static function contact($data)
    // {
    //     $mail = new ContactMail($data);
    //     Mailer::to(env('MAIL_CONTACT_ADDRESS'))->send($mail);
    //     return true;
    // }
}
