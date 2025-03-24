<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecimiento de Contraseña</title>
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
        
        .reset-box {
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 4px solid #4f46e5;
            text-align: center;
        }
        
        .reset-icon {
            background-color: #4f46e5;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        
        .reset-icon svg {
            width: 35px;
            height: 35px;
            fill: #ffffff;
        }
        
        .reset-text {
            font-size: 16px;
            color: #555555;
            margin-bottom: 20px;
        }
        
        .cta-button {
            display: inline-block;
            background-color: #4f46e5;
            color: #ffffff;
            text-decoration: none;
            padding: 14px 24px;
            border-radius: 6px;
            font-weight: 600;
            text-align: center;
            margin: 10px 0;
            transition: background-color 0.3s;
        }
        
        .cta-button:hover {
            background-color: #4338ca;
        }
        
        .security-note {
            background-color: #fee2e2;
            border-radius: 8px;
            padding: 15px;
            border-left: 4px solid #ef4444;
            margin: 30px 0;
        }
        
        .security-note-title {
            display: flex;
            align-items: center;
            font-weight: 600;
            color: #b91c1c;
            margin-bottom: 5px;
        }
        
        .security-note-title svg {
            width: 18px;
            height: 18px;
            fill: #ef4444;
            margin-right: 8px;
        }
        
        .security-note-content {
            color: #7f1d1d;
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
            <h1>Restablecimiento de Contraseña</h1>
        </div>
        
        <div class="email-body">
            <div class="greeting">Hola {{ $nombre }},</div>
            
            <p class="message">
                Hemos recibido una solicitud para restablecer la contraseña de tu cuenta. Si no has sido tú quien ha solicitado este cambio, puedes ignorar este mensaje.
            </p>
            
            <div class="reset-box">
                <div class="reset-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/>
                    </svg>
                </div>
                
                <div class="reset-text">
                    Para restablecer tu contraseña, haz clic en el botón de abajo:
                </div>
                
                <a href="{{ url('http://127.0.0.1:3000/login/res?token=' . $token) }}" class="cta-button">
                    Restablecer contraseña
                </a>
            </div>
            
            <div class="security-note">
                <div class="security-note-title">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                    Información importante
                </div>
                <div class="security-note-content">
                    Este enlace de restablecimiento expirará en 60 minutos por razones de seguridad. Si el enlace ha expirado, deberás solicitar un nuevo restablecimiento de contraseña.
                </div>
            </div>
            
            <p class="message">
                Si no solicitaste este cambio de contraseña, te recomendamos revisar la seguridad de tu cuenta o contactar a nuestro equipo de soporte inmediatamente.
            </p>
            
            <p class="message">
                Saludos,<br>
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