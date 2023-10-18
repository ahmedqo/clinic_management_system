<?php

namespace App\Functions;

use App\Models\System;
use Carbon\Carbon;

class Core
{
    public static function convert($size)
    {
        $unit = ($size > 1000000000) ? "GB" : (($size > 1000000) ? "MB" : "KB");
        if ($unit == "KB") {
            $size = round($size / 1024, 4);
        }
        if ($unit == "MB") {
            $size = round($size / 1024 / 1024, 4);
        }
        if ($unit == "GB") {
            $size = round($size / 1024 / 1024 / 1024, 4);
        }
        return number_format($size, 2, '.', '') . ' ' . $unit;
    }

    public static function lang($lang = 'en')
    {
        return app()->getLocale() == $lang;
    }

    public static function system()
    {
        return System::first();
    }

    public static function status()
    {
        return ['canceled', 'pending', 'completed'];
    }

    public static function gender()
    {
        return ['male', 'female'];
    }

    public static function record()
    {
        return ['allergies', 'medications', 'diagnoses', 'procedures', 'chronic illnesses', 'blood group', 'notes'];
    }

    public static function prescription()
    {
        return ['medicine', 'test'];
    }

    public static function document()
    {
        return ['prescription', 'radiology reports', 'pathology reports', 'operative reports', 'laboratory reports', 'consultation notes', 'medical history'];
    }

    public static function entry()
    {
        return ['progress', 'physical', 'diagnostic', 'consultation', 'surgical', 'diagnosis', 'summary', 'recommendation', 'description', 'examination '];
    }

    public static function payment()
    {
        return ['cash', 'credit card'];
    }

    public static function event()
    {
        return ['conferences', 'seminars', 'academic', 'vacation'];
    }

    public static function timeSlot()
    {
        $slotDuration = Core::system()->slot;
        $workStart = Carbon::createFromTimeString(Core::system()->work_start);
        $workEnd = Carbon::createFromTimeString(Core::system()->work_end);
        $breakStart = Carbon::createFromTimeString(Core::system()->break_start);
        $breakEnd = Carbon::createFromTimeString(Core::system()->break_end);
        $startTime = $workStart;
        $endTime = $workEnd;
        $slots = [];

        while ($startTime <= $endTime) {
            if ($startTime > $breakStart && $startTime < $breakEnd) {
                $startTime->addMinutes($slotDuration);
                continue;
            }
            $slots[] = $startTime->format('H:i:s');
            $startTime->addMinutes($slotDuration);
        }

        return $slots;
    }

    public static function slot()
    {
        $slotDuration = 5;
        $startTime = Carbon::createFromTime(0, 0, 0);
        $endTime = Carbon::createFromTime(23, 59, 0);
        $slots = [];

        while ($startTime <= $endTime) {
            $slots[] = $startTime->format('H:i:s');
            $startTime->addMinutes($slotDuration);
        }

        return $slots;
    }

    public static function days()
    {
        return ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
    }

    public static function report()
    {
        return ['day', 'week', 'month'];
    }

    public static function disabled()
    {
        $work = Core::system()->workDays();
        $days = [];

        foreach (Core::days() as $key => $value)
            if (!in_array($value, $work)) $days[] = $key + 1;

        return implode(',', $days);
    }
}
