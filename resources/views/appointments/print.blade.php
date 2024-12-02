{{-- diseño del turno que se va a imprimir en pdf --}}


<h2>Fecha del turno: {{ $appointment->dtappointment_date }}</h2>
<br>
<h2>Medico: {{ $appointment->Doctor->cdoctor_name }}</h2>
<br>
<h2>PACIENTE: {{ $appointment->Patient->cpatient_name }}</h2>
<br>
