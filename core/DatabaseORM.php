<?php

namespace Core;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class DatabaseORM
{

    public function __construct(array $config = [])
    {
        $capsule = new Manager;

        $capsule->addConnection([
            'driver'    => $config['driver'],
            'host'      => $config['host'],
            'database'  => $config['database'],
            'username'  => $config['user'],
            'password'  => $config['password'],
            'charset'   => $config['charset'],
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ]);

        // linea para el manejo eventos de eloquent
        $capsule->setEventDispatcher(new Dispatcher(new Container));

        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();
    }
}
