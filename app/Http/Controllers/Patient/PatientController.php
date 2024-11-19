<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//modelos
use App\Models\Patient;
use App\Models\HealthInsurance;


class PatientController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $patients = Patient::join('health_insurances', 'patients.id_insurance', "=", "health_insurances.id")
        ->select('patients.*', 'health_insurances.cinsurance_name')
        ->orderBy('cpatient_name','asc')
        ->paginate(5);
        // $doctors = Doctor::where('id','<>',1)
        // ->orwhere('id',1)
        // ->orderBy('cdoctor_name','asc')
        // ->paginate(5);
        //trae lo registros por paginas de a 5
        //si quiero traer todos los registros utiizo ->get()


        return view('patients.index',['patients' => $patients]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $insurances = HealthInsurance::get();

        return view('patients.create',['insurances'=>$insurances]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validaciones
        $rules = [
            'npatient_dni' => 'required|unique:patients,npatient_dni',
            'cpatient_phone' => 'required|unique:patients,cpatient_phone',
        ];

        $messages = [
            'npatient_dni.required' => '* El DNI es obligatorio *',
            'npatient_dni.unique' => '* El DNI YA EXISTE *',
            'cpatient_phone.required' => '* EL TELEFONO ES OBLIGATORIO *',
            'cpatient_phone.unique' => '* EL TELEFONO YA EXISTE *',
        ];

        $request->validate($rules, $messages);


        $cpatient_name = strtoupper($request->cpatient_name);
        $cpatient_address = strtoupper($request->cpatient_address);
        $cpatient_sex = strtoupper($request->cpatient_sex);

        Patient::create(
            [
               'cpatient_name' => $cpatient_name,
               'npatient_dni' => $request->npatient_dni,
               'cpatient_address' => $cpatient_address,
               'id_insurance' => $request->id_insurance,
               'cpatient_sex' => $request->cpatient_sex,
               'cpatient_phone' => $request->cpatient_phone,
               'dpatient_birthdate' => $request->dpatient_birthdate,
            ]

        );

        return redirect()->route('patients.index');
    }

        /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $patient = Patient::find($id);

        $insurances = HealthInsurance::get();

        return view('patients.edit', ['patient' => $patient, 'insurances'=>$insurances]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

         //validaciones
        $rules = [
            'npatient_dni' => 'required|unique:patients,npatient_dni,'.$request->id,
            'cpatient_phone' => 'required|unique:patients,cpatient_phone,'.$request->id,
        ];

        $messages = [
            'npatient_dni.required' => '* El DNI es obligatorio *',
            'npatient_dni.unique' => '* El DNI YA EXISTE *',
            'cpatient_phone.required' => '* EL TELEFONO ES OBLIGATORIO *',
            'cpatient_phone.unique' => '* EL TELEFONO YA EXISTE *',
        ];

        $request->validate($rules, $messages);

        $patient_id = $request->id;

        $cpatient_name = strtoupper($request->cpatient_name);
        $cpatient_address = strtoupper($request->cpatient_address);
        $cpatient_sex = strtoupper($request->cpatient_sex);

    
        //buscar el registro de doctores para actualizar
        $patient = Patient::find( $patient_id );

        $patient->update(
            [
                'cpatient_name' => $cpatient_name,
                'npatient_dni' => $request->npatient_dni,
               'cpatient_address' => $cpatient_address,
               'id_insurance' => $request->id_insurance,
               'cpatient_sex' => $request->cpatient_sex,
               'cpatient_phone' => $request->cpatient_phone,
               'dpatient_birthdate' => $request->dpatient_birthdate,
            ]
        );

        return redirect()->route('patients.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $patient = patient::find($id);

        $patient->delete();

        return redirect()->route('patients.index');
    }
}
