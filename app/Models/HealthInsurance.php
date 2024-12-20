<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthInsurance extends Model
{

    protected $fillable = [
        'cinsurance_name',
    ];

    public function patients()
    {

        return $this->hasMany(Patient::class);
    }
}
