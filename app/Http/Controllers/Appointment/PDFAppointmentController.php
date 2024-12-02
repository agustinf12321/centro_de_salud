<?php

namespace App\Http\Controllers\Appointment;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class PDFAppointmentController extends Controller
{

    public function print()
    {

        //guardo la id del turno
        $id = request('id');
        //creo que objeto con los atributos del turno (fecha y llaves foraneas)
        $appointment = Appointment::find($id);
        //creo el objeto pdf y transformo el objeto appointment en un array
        $pdf = Pdf::loadView('appointments.print', ['appointment' => $appointment]);
        return $pdf->stream('turno.pdf');
    }
}
