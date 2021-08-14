<?php

namespace Core;

use Swift_Attachment;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Mailer
{

    protected string $host;
    protected int $port;
    protected string $username;
    protected string $password;
    protected Swift_Message $mensaje;

    public Swift_Mailer $mailer;

    public function __construct()
    {
        $this->host = 'smtp.mailtrap.io';
        $this->port = 2525;
        $this->username = '3ed83bbba30884';
        $this->password = 'b5447700833beb';

        // crear el transportador
        $transport = (new Swift_SmtpTransport($this->host, $this->port))
            ->setUsername($this->username)->setPassword($this->password);

        $this->mailer = new Swift_Mailer($transport);
    }
//
//    public function adjuntarArchivo($ruta, $tipo_contenido)
//    {
//        $archivo = Swift_Attachment::fromPath($ruta, $tipo_contenido);
//        $this->mensaje->attach($archivo);
//    }

    public function enviarMensaje(Swift_Message $message)
    {
        $this->mailer->send($message);
    }
}
