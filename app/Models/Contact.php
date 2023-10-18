<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient',
        'first_name',
        'last_name',
        'email',
        'phone',
    ];

    public function patient()
    {
        return Patient::find($this->patient);
    }
}
