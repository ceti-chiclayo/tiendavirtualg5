<?php

namespace App\Mail;

class SolicitarCambioPasswordMail extends \Swift_Message
{
    public string $dominio;
    public string $token;

    public function __construct(string $dominio, string $token)
    {
        $this->dominio = $dominio;
        $this->token = $token;
        parent::__construct();
        $this->mensaje();
    }

    public function mensaje()
    {
        $view = viewOnly('emails/solicitar-recuperar-password', ['dominio' => $this->dominio, 'token' => $this->token]);
        $this->setBody($view, 'text/html');
    }
}