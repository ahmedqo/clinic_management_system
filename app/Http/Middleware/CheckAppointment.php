<?php

namespace App\Http\Middleware;

use App\Functions\Core;
use App\Models\Appointment;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckAppointment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $appointments = Appointment::where("status", Core::status()[1])->get();

        foreach ($appointments as $appointment) {
            $appointmentDateTime = Carbon::parse($appointment->date . ' ' . $appointment->time);

            if ($appointmentDateTime->isPast()) {
                $appointment->status = Core::status()[0];
                $appointment->save();
            }
        }

        return $next($request);
    }
}
