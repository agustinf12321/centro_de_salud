<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Speciality;
use App\Models\HealthInsurance;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(
            [
                'name'  => "Administrador",
                'email' => "admin@admin",
                'password' => Hash::make('admin1234')
            ]

        );

        Speciality::create(
            [
                'id' => 1,
                'cspeciality_name' => " SIN ESPECIALIDAD"
            ]
        );

        HealthInsurance::create(
            [
                'id' => 1,
                'cinsurance_name' => " SIN OBRA SOCIAL"
            ]
        );



    }
}
