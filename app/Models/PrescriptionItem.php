<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'prescription',
        'type',
        'content',
        'note',
    ];

    public function prescription()
    {
        return Prescription::find($this->prescription);
    }
}
