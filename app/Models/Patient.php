<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birth_date',
        'identity',
        'nationality',
        'email',
        'phone',
        'address',
        'state',
        'city',
        'zipcode',
        'insurance_provider',
        'insurance_number',
    ];

    public function appointments()
    {
        return Appointment::where('patient', $this->id)->orderBy('id', 'DESC')->get();
    }

    public function contacts()
    {
        return Contact::where('patient', $this->id)->orderBy('id', 'DESC')->get();
    }

    public function records()
    {
        return Record::where('patient', $this->id)->orderBy('id', 'DESC')->get();
    }

    public function entries()
    {
        return Entry::where('patient', $this->id)->orderBy('id', 'DESC')->get();
    }

    public function prescriptions()
    {
        return Prescription::where('patient', $this->id)->orderBy('id', 'DESC')->get();
    }

    public function documents()
    {
        return Document::where('patient', $this->id)->orderBy('id', 'DESC')->get();
    }

    public function invoices()
    {
        return Invoice::where('patient', $this->id)->orderBy('id', 'DESC')->get();
    }
}
