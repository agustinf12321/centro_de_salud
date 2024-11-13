<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'dtappointment_date',
        'id_patient',
        'id_doctor',
        'id_office',
        'id_insurance',
    ];

    public function Patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }

    public function Doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctor');
    }

    public function Office()
    {
        return $this->belongsTo(Office::class, 'id_office');
    }

    public function HealthInsurance()
    {
        return $this->belongsTo(HealthInsurance::class, 'id_insurance');
    }
}
