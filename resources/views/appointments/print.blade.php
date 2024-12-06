{{-- diseño del turno que se va a imprimir en pdf --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Turno</title>
</head>

<body>

    <h2>Fecha del turno: {{ $appointment->dtappointment_date }}</h2>
    <br>
    <h2>Medico: {{ $appointment->Doctor->cdoctor_name }}</h2>
    <br>
    <h2>PACIENTE: {{ $appointment->Patient->cpatient_name }}</h2>
    <br>


</body>

</html>
