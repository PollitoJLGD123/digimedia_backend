<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido a la plataforma</title>
</head>
<body>
    <h2>Hola {{ $nombre }},</h2>
    <p>Te damos la bienvenida a nuestra plataforma. A continuación, te enviamos tus credenciales de acceso:</p>

    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Contraseña:</strong> {{ $password }}</p>

    <p>Puedes iniciar sesión en nuestro sistema haciendo clic en el siguiente enlace:</p>
    <p><a href="{{ url('http://127.0.0.1:3000/login') }}">Ir a la plataforma</a></p>

    <p>Por seguridad, te recomendamos cambiar tu contraseña después de iniciar sesión.</p>

    <p>Saludos,<br>El equipo de soporte</p>
</body>
</html>
