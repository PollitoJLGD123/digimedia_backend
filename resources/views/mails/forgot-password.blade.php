<!DOCTYPE html>
<html>
<head>
    <title>Restablecimiento de Contraseña</title>
</head>
<body>
    <h2>Hola {{ $nombre }},</h2>

    <p>Hemos recibido una solicitud para restablecer tu contraseña.</p>

    <p>Puedes cambiar tu contraseña haciendo clic en el siguiente enlace:</p>

    <p>
        <a href="{{ url('http://127.0.0.1:3000/login/res?token=' . $token) }}"
           style="display: inline-block; padding: 10px 15px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px;">
           Restablecer contraseña
        </a>
    </p>

    <p>Si no solicitaste el cambio, puedes ignorar este mensaje.</p>

    <p>Saludos,<br>El equipo de soporte</p>
</body>
</html>
