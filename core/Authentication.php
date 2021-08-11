<?php


namespace Core;


use App\Models\Usuario;

class Authentication
{
    public function user()
    {
        return Usuario::find(session()->get('usuario'));
    }

    public function isAuth(): bool
    {
        if (session()->get('usuario') === false) {
            return false;
        }
        if (is_null($this->user())) {
            session()->remove('usuario');
            return false;
        }
        return true;
    }
}