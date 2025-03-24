<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a la plataforma</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }
        
        .email-header {
            background-color: #4f46e5;
            padding: 30px;
            text-align: center;
        }
        
        .email-header img {
            max-width: 180px;
            height: auto;
        }
        
        .email-header h1 {
            color: #ffffff;
            margin: 20px 0 0;
            font-weight: 600;
            font-size: 24px;
        }
        
        .email-body {
            padding: 40px 30px;
        }
        
        .greeting {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333333;
        }
        
        .message {
            margin-bottom: 30px;
            color: #555555;
            font-size: 16px;
        }
        
        .credentials-box {
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 4px solid #4f46e5;
        }
        
        .credential-item {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .credential-item:last-child {
            margin-bottom: 0;
        }
        
        .credential-icon {
            background-color: #4f46e5;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        
        .credential-icon svg {
            width: 18px;
            height: 18px;
            fill: #ffffff;
        }
        
        .credential-label {
            font-weight: 600;
            color: #4f46e5;
            margin-bottom: 3px;
            font-size: 14px;
        }
        
        .credential-value {
            font-weight: 500;
            font-size: 16px;
            color: #333333;
            word-break: break-all;
        }
        
        .cta-button {
            display: block;
            background-color: #4f46e5;
            color: #ffffff;
            text-decoration: none;
            padding: 14px 24px;
            border-radius: 6px;
            font-weight: 600;
            text-align: center;
            margin: 30px 0;
            transition: background-color 0.3s;
        }
        
        .cta-button:hover {
            background-color: #4338ca;
        }
        
        .security-note {
            background-color: #fffbeb;
            border-radius: 8px;
            padding: 15px;
            border-left: 4px solid #f59e0b;
            margin-bottom: 30px;
        }
        
        .security-note-title {
            display: flex;
            align-items: center;
            font-weight: 600;
            color: #b45309;
            margin-bottom: 5px;
        }
        
        .security-note-title svg {
            width: 18px;
            height: 18px;
            fill: #f59e0b;
            margin-right: 8px;
        }
        
        .security-note-content {
            color: #78350f;
            font-size: 14px;
        }
        
        .email-footer {
            background-color: #f8fafc;
            padding: 25px 30px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }
        
        .company-info {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 15px;
        }
        
        .social-links {
            margin-bottom: 15px;
        }
        
        .social-link {
            display: inline-block;
            margin: 0 8px;
        }
        
        .social-link img {
            width: 24px;
            height: 24px;
        }
        
        .copyright {
            font-size: 12px;
            color: #94a3b8;
        }
        
        @media only screen and (max-width: 600px) {
            .email-body {
                padding: 30px 20px;
            }
            
            .email-header {
                padding: 20px;
            }
            
            .email-header h1 {
                font-size: 20px;
            }
            
            .greeting {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <img src="https://via.placeholder.com/180x50/4f46e5/ffffff?text=EMPRESA" alt="Logo de la empresa">
            <h1>¡Bienvenido a nuestra plataforma!</h1>
        </div>
        
        <div class="email-body">
            <div class="greeting">Hola {{ $nombre }},</div>
            
            <p class="message">
                Estamos encantados de darte la bienvenida a nuestra plataforma. Hemos creado tu cuenta y a continuación encontrarás tus credenciales de acceso:
            </p>
            
            <div class="credentials-box">
                <div class="credential-item">
                    <div class="credential-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="credential-label">Email</div>
                        <div class="credential-value">{{ $email }}</div>
                    </div>
                </div>
                
                <div class="credential-item">
                    <div class="credential-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="credential-label">Contraseña</div>
                        <div class="credential-value">{{ $password }}</div>
                    </div>
                </div>
            </div>
            
            <a href="{{ url('http://127.0.0.1:3000/login') }}" class="cta-button">
                Iniciar sesión ahora
            </a>
            
            <div class="security-note">
                <div class="security-note-title">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2L4 5v6.09c0 5.05 3.41 9.76 8 10.91 4.59-1.15 8-5.86 8-10.91V5l-8-3zm1 13h-2v-2h2v2zm0-4h-2V7h2v4z"/>
                    </svg>
                    Nota de seguridad
                </div>
                <div class="security-note-content">
                    Por tu seguridad, te recomendamos cambiar tu contraseña inmediatamente después de iniciar sesión por primera vez. Nunca compartas tus credenciales con otras personas.
                </div>
            </div>
            
            <p class="message">
                Si tienes alguna pregunta o necesitas ayuda, no dudes en contactar a nuestro equipo de soporte.
            </p>
            
            <p class="message">
                ¡Esperamos que disfrutes de nuestra plataforma!<br>
                <strong>El equipo de soporte</strong>
            </p>
        </div>
        
        <div class="email-footer">
            <div class="company-info">
                Empresa S.A. de C.V.<br>
                Av. Principal #123, Ciudad<br>
                +52 (123) 456-7890
            </div>
            
            <div class="social-links">
                <a href="#" class="social-link">
                    <img src="https://via.placeholder.com/24/4f46e5/ffffff?text=F" alt="Facebook">
                </a>
                <a href="#" class="social-link">
                    <img src="https://via.placeholder.com/24/4f46e5/ffffff?text=T" alt="Twitter">
                </a>
                <a href="#" class="social-link">
                    <img src="https://via.placeholder.com/24/4f46e5/ffffff?text=I" alt="Instagram">
                </a>
                <a href="#" class="social-link">
                    <img src="https://via.placeholder.com/24/4f46e5/ffffff?text=L" alt="LinkedIn">
                </a>
            </div>
            
            <div class="copyright">
                &copy; {{ date('Y') }} Empresa. Todos los derechos reservados.
            </div>
        </div>
    </div>
</body>
</html>