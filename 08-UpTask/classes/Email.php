<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $token;
    public $nombre;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion()
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'd6a1e42100fc07';
        $mail->Password = 'dfcb1b77988591';

        $mail->setFrom('cuentas@uptask.com');
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Confirma tu cuenta';

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $contenido = '<html>';
        $contenido .= '<p>¡Hola, ' . $this->nombre . ' Has creado tu cuenta en UpTask! </p>';
        $contenido .= '<p>Presiona este <a href="http://localhost:3000/confirmar?token=' . $this->token . '">enlace</a> para confirmar tu cuenta</p>';
        $contenido .= '<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>';
        $contenido .= '</html>';

        $mail->Body = $contenido;

        $mail->send();
    }
}
