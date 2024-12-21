<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;
    
    public function __construct($nombre, $email, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }



    public function enviarConfirmacion() {
        // Crear el objeto de email

        $mail = new PHPMailer();
        $mail->isSMTP(); // Protocolo de envío de Emails
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu Cuenta';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "
        <style>
            p { font-size: 16px; text-align center; }
            strong { color: #0da6f3; font-weight: bold;}
            a { background-color: #0da6f3; text-decoration: none; font-weight: bold; color: #fff; padding: 10px 20px;}
        </style>
        ";
        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong>. Has creado tu cuenta en App Salon, solo debes confirmarla presionando el siguiente enlace: </p>";
        $contenido .= "<p>Presiona aquí: <a href='". $_ENV['APP_URL'] ."/confirmar-cuenta?token=". $this->token . "'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje.</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar el Mail
        $mail->send();

    }

    public function enviarInstrucciones() {
        $mail = new PHPMailer();
        $mail->isSMTP(); // Protocolo de envío de Emails
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Restablece tu Contraseña';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
        $contenido = "<html>";
        $contenido .= "
        <style>
            p { font-size: 16px; text-align center; }
            strong { color: #0da6f3; font-weight: bold;}
            a { background-color: #0da6f3; text-decoration: none; font-weight: bold; color: #fff; padding: 10px 20px;}
        </style>
        ";
        $contenido .= "<p>Hola <strong>" . $this->nombre . "</strong>. Has solicitado restablecer tu contraseña, presiona el siguiente enlace para hacerlo: </p>";
        $contenido .= "<p>Presiona aquí: <a href='". $_ENV['APP_URL'] ."/recuperar?token=". $this->token . "'>Restablecer Contraseña</a></p>";
        $contenido .= "<p>Si tu no solicitaste esto, puedes ignorar el mensaje.</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar el Mail
        $mail->send();

    }
}