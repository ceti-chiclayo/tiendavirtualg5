<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use Core\Controller;

class LogoutController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
    }


    public function logout()
    {
        session_destroy(); // destruir mi sesión actual
        response()->redirect("login");
    }
}
