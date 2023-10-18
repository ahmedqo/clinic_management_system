<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient',
        'type',
        'name',
        'mime',
        'size',
    ];

    public function patient()
    {
        return Patient::find($this->patient);
    }
}
