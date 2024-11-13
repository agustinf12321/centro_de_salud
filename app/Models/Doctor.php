<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'cdoctor_name',
        'ndoctor_dni',
        'cdoctor_address',
        'id_speciality',
        'ndoctor_tuition', //matricula
        'cdoctor_phone',
        'ddoctor_startdate',
    ];

    public function Speciality()
    {
        return $this->belongsTo(Speciality::class, 'id_speciality');
    }
}
