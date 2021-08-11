<?php

namespace Core;

use Swift_Attachment;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Mail
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
        $this->username = 'c51584bf433ae3';
        $this->password = '662ac2ceca52b8';

        // crear el transportador
        $transport = (new Swift_SmtpTransport($this->host, $this->port))
            ->setUsername($this->username)->setPassword($this->password);

        $this->mailer = new Swift_Mailer($transport);
    }

    public function adjuntarArchivo($ruta, $tipo_contenido)
    {
        $archivo = Swift_Attachment::fromPath($ruta, $tipo_contenido);
        $this->mensaje->attach($archivo);
    }

    public function mensaje($toMail, $toName, $subject, $body, $fromMail, $fromName)
    {
        $this->mensaje = (new Swift_Message($subject))
            ->setFrom([
                $fromMail => $fromName
            ])
            ->setTo([
                $toMail => $toName
            ])
            ->setBody($body, 'text/html');
    }

    public function enviarMensaje()
    {
        $this->mailer->send($this->mensaje);
    }
}
