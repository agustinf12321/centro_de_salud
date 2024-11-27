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
use App\Models\Speciality;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //cargar tablas paciente, doctor
        $patients = Patient::orderBy('cpatient_name', 'asc')
            ->get();
        $doctors = Doctor::orderBy('cdoctor_name', 'asc')
            ->get();

        $doctor = request('doctor');
        $paciente = request('paciente');
        $orden = request('orden');

        $orderby = 'dtappointment_date';

        switch ($orden) {
            case 0:
                $orderby = 'dtappointment_date';
                break;
            case 1:
                $orderby = 'cdoctor_name';
                break;
            case 2:
                $orderby = 'cpatient_name';
                break;
            case 3:
                $orderby = 'coffice_name';
                break;
            case 4:
                $orderby = 'cinsurance_name';
                break;
            default:
                $orderby = 'dtappointment_date';
                break;
        }



        $appointments = Appointment::join('patients', 'appointments.id_patient', "=", "patients.id")
            ->join('doctors', 'appointments.id_doctor', "=", "doctors.id")
            ->join('offices', 'appointments.id_office', "=", "offices.id")
            ->join('health_insurances', 'appointments.id_insurance', "=", "health_insurances.id")
            ->select('appointments.*', 'patients.cpatient_name', 'doctors.cdoctor_name', 'offices.coffice_name', 'health_insurances.cinsurance_name')
            ->where('cdoctor_name', 'like', '%' . $doctor . '%')
            ->where('cpatient_name', 'like', '%' . $paciente . '%')
            ->orderBy($orderby, 'asc')
            ->paginate(5);
        // $doctors = Doctor::where('id','<>',1)
        // ->orwhere('id',1)
        // ->orderBy('cdoctor_name','asc')
        // ->paginate(5);
        //trae lo registros por paginas de a 5
        //si quiero traer todos los registros utiizo ->get()

        // dd($doctors);

        return view('appointments.index', ['appointments' => $appointments, 'patients' => $patients, 'doctors' => $doctors, 'orden' => $orden,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patients = Patient::get();
        $doctors = Doctor::get();
        $offices = Office::get();
        $insurance = HealthInsurance::get();


        return view('appointments.create', ['patients' => $patients, 'doctors' => $doctors, 'offices' => $offices, 'insurance' => $insurance,]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validaciones
        $rules = [
            'dtappointment_date' => 'required',
        ];

        $messages = [
            'dtappointment_date.required' => '* Ingrese una fecha valida *',
        ];

        $request->validate($rules, $messages);

        //buscar obra social en base al paciente

        $patient = Patient::find($request->id_patient);


        $date = $request->dtappointment_date;
        $id_patient = $request->id_patient;
        $id_doctor = $request->id_doctor;
        $id_office = $request->id_office;
        $id_insurance = $patient->HealthInsurance->id;
        $request->id_insurance;





        Appointment::create(
            [
                'dtappointment_date' => $date,
                'id_patient' => $id_patient,
                'id_doctor' => $id_doctor,
                'id_office' => $id_office,
                'id_insurance' => $id_insurance,
            ]

        );

        return redirect()->route('appointments.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $appointment = Appointment::find($id);

        $patients = Patient::get();
        $doctors = Doctor::get();
        $offices = Office::get();
        $insurance = HealthInsurance::get();



        return view('appointments.edit', ['appointment' => $appointment, 'patients' => $patients, 'doctors' => $doctors, 'offices' => $offices, 'insurance' => $insurance,]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        //validaciones
        $rules = [
            'dtappointment_date' => 'required',
        ];

        $messages = [
            'dtappointment_date.required' => '* Ingrese una fecha valida *',
        ];

        $request->validate($rules, $messages);

        $appointment_id = $request->id;


        //buscar el registro de turno para actualizar
        $appointment = Appointment::find($appointment_id);

        //buscar obra social en base al paciente

        $patient = Patient::find($request->id_patient);


        $date = $request->dtappointment_date;
        $id_patient = $request->id_patient;
        $id_doctor = $request->id_doctor;
        $id_office = $request->id_office;
        $id_insurance = $patient->HealthInsurance->id;
        $request->id_insurance;



        $appointment->update(
            [
                'dtappointment_date' => $date,
                'id_patient' => $id_patient,
                'id_doctor' => $id_doctor,
                'id_office' => $id_office,
                'id_insurance' => $id_insurance,
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
