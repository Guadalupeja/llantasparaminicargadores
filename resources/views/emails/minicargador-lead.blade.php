<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nuevo prospecto minicargadores</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; color: #0f172a; line-height: 1.6;">
    <h2>Nuevo prospecto desde el chat de minicargadores</h2>

    <p><strong>Nombre:</strong> {{ $lead['nombre'] }}</p>
    <p><strong>Empresa:</strong> {{ $lead['empresa'] ?? 'No proporcionada' }}</p>
    <p><strong>Tipo de llanta:</strong> {{ $lead['tipo_llanta'] }}</p>
    <p><strong>Medida:</strong> {{ $lead['medida'] }}</p>
    <p><strong>Teléfono:</strong> {{ $lead['telefono'] }}</p>
    <p><strong>Correo:</strong> {{ $lead['correo'] }}</p>
    <p><strong>Mensaje:</strong> {{ $lead['mensaje'] ?? 'Sin mensaje' }}</p>
    <p><strong>Origen:</strong> {{ $lead['origen'] ?? 'Chat selector minicargador' }}</p>
</body>
</html>