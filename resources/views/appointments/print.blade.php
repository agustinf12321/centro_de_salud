{{-- diseño del turno que se va a imprimir en pdf --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Turno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 10px;
            width: 300px;
        }
        .ticket {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 0 auto;
            max-width: 260px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 18px;
            margin: 0;
        }
        .info {
            margin-bottom: 15px;
        }
        .info p {
            margin: 5px 0;
            font-size: 14px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="header">
            <h1>Centro de Salud Fermosa</h1>
            <p>Ticket de Turno</p>
        </div>
        <div class="info">
            <p><strong>Fecha y Hora del Turno:</strong> {{ $appointment->dtappointment_date }}</p>
            <p><strong>Paciente:</strong> {{ $appointment->Patient->cpatient_name }}</p>
            <p><strong>Médico:</strong> {{ $appointment->Doctor->cdoctor_name }}</p>
            <p><strong>Consultorio:</strong> {{ $appointment->Office->coffice_name }}</p>
        </div>
        <div class="footer">
            <p>Por favor, llegue 10 minutos antes de su turno.</p>
            <p>Gracias por elegirnos.</p>
        </div>
    </div>
</body>
</html>
