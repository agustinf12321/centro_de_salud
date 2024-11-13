<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'cpatient_name',
        'npatient_dni',
        'cpatient_address',
        'cpatient_phone',
        'cpatient_sex',
        'dpatient_birthdate',
        'id_insurance',
    ];

    public function HealthInsurance()
    {
        return $this->belongsTo(HealthInsurance::class, 'id_insurance');
    }

}
