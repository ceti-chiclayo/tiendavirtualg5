<?php

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;
use App\Middlewares\VerificarAdminMiddleware;
use Core\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
        $this->registerMiddleware(new VerificarAdminMiddleware());
    }

    public function dashboard()
    {
        $this->setLayout('app');
        return view('dashboard');
    }
}
