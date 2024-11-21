<?php

namespace App\Http\Controllers\Appointment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//modelos
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Office;
use App\Models\HealthInsurance;
use App\Models\Appointment;


class AppointmentController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //cargar tablas paciente, doctor, consultorio, obra social

        $appointments = Appointment::join('patients', 'appointments.id_patient', "=", "patients.id")
        ->join('doctors', 'appointments.id_doctor', "=", "doctors.id")
        ->join('offices', 'appointments.id_office', "=", "offices.id")
        ->join('health_insurances', 'appointments.id_insurance', "=", "health_insurances.id")
        ->select('appointments.*', 'patients.cpatient_name', 'doctors.cdoctor_name', 'offices.coffice_name', 'health_insurances.cinsurance_name')
        ->orderBy('dtappointment_date','asc')
        ->paginate(5);
        // $doctors = Doctor::where('id','<>',1)
        // ->orwhere('id',1)
        // ->orderBy('cdoctor_name','asc')
        // ->paginate(5);
            //trae lo registros por paginas de a 5
            //si quiero traer todos los registros utiizo ->get()

           // dd($doctors);

        return view('appointments.index',['appointments' => $appointments]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialities = Speciality::get();

        return view('appointments.create',['specialities'=>$specialities]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validaciones
        $rules = [
            'ndoctor_dni' => 'required|unique:doctors,ndoctor_dni',
            'ndoctor_tuition' => 'required|unique:doctors,ndoctor_tuition',
            'cdoctor_phone' => 'required|unique:doctors,cdoctor_phone',
        ];

        $messages = [
            'ndoctor_dni.required' => '* El DNI es obligatorio *',
            'ndoctor_dni.unique' => '* El DNI YA EXISTE *',
            'ndoctor_tuition.required' => '* LA MATRICULA ES OBLIGATORIA *',
            'ndoctor_tuition.unique' => '* LA MATRICULA YA EXISTE *',
            'cdoctor_phone.required' => '* EL TELEFONO ES OBLIGATORIO *',
            'cdoctor_phone.unique' => '* EL TELEFONO YA EXISTE *',
        ];

        $request->validate($rules, $messages);


        $cdoctor_name = strtoupper($request->cdoctor_name);
        $cdoctor_address = strtoupper($request->cdoctor_address);

        Doctor::create(
            [
               'cdoctor_name' => $cdoctor_name,
               'ndoctor_dni' => $request->ndoctor_dni,
               'cdoctor_address' => $cdoctor_address,
               'id_speciality' => $request->id_speciality,
               'ndoctor_tuition' => $request->ndoctor_tuition,
               'cdoctor_phone' => $request->cdoctor_phone,
               'ddoctor_startdate' => $request->ddoctor_startdate,
            ]

        );

        return redirect()->route('appointments.index');
    }

        /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);

        $specialities = Speciality::orderBy('cspeciality_name','asc')->get();

        return view('appointments.edit', ['doctor' => $doctor, 'specialities'=>$specialities]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

         //validaciones
         $rules = [
            'ndoctor_dni' => 'required|unique:doctors,ndoctor_dni,'.$request->id,
            'ndoctor_tuition' => 'required|unique:doctors,ndoctor_tuition,'.$request->id,
            'cdoctor_phone' => 'required|unique:doctors,cdoctor_phone,'.$request->id,
        ];

        $messages = [
            'ndoctor_dni.required' => '* El DNI es obligatorio *',
            'ndoctor_dni.unique' => '* El DNI YA EXISTE *',
            'ndoctor_tuition.required' => '* LA MATRICULA ES OBLIGATORIA *',
            'ndoctor_tuition.unique' => '* LA MATRICULA YA EXISTE *',
            'cdoctor_phone.required' => '* EL TELEFONO ES OBLIGATORIO *',
            'cdoctor_phone.unique' => '* EL TELEFONO YA EXISTE *',
        ];

        $request->validate($rules, $messages);

        $doctor_id = $request->id;
        $cdoctor_name = strtoupper($request->cdoctor_name);
        $cdoctor_address = strtoupper($request->cdoctor_address);

    
        //buscar el registro de doctores para actualizar
        $doctor = Doctor::find( $doctor_id );

        $doctor->update(
            [
                'cdoctor_name' => $cdoctor_name,
               'ndoctor_dni' => $request->ndoctor_dni,
               'cdoctor_address' => $cdoctor_address,
               'id_speciality' => $request->id_speciality,
               'ndoctor_tuition' => $request->ndoctor_tuition,
               'cdoctor_phone' => $request->cdoctor_phone,
               'ddoctor_startdate' => $request->ddoctor_startdate,
            ]
        );

        return redirect()->route('appointments.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        $doctor->delete();

        return redirect()->route('appointments.index');
    }
}
