<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient',
        'payment',
        'note',
    ];

    public function patient()
    {
        return Patient::find($this->patient);
    }

    public function items()
    {
        return InvoiceItem::where('invoice', $this->id)->get();
    }
}
