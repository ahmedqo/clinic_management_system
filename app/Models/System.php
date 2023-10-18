<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;

    protected $table = 'system';
    public $timestamps = false;

    protected $fillable = [
        'work_days',
        'work_start',
        'work_end',
        'break_start',
        'break_end',
        'currency',
        'slot',
        'cost',
        'report',
    ];

    public function workDays()
    {
        return explode(',', $this->attributes['work_days']);
    }
}
