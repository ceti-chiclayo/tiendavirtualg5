<?php

use Dotenv\Dotenv;

date_default_timezone_set("America/Lima");

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Application;

// obtener la ubicacion de la carpeta del proyecto
$root_dir = dirname(__DIR__);

$dotenv = Dotenv::createImmutable($root_dir);
$dotenv->load();

// cargar configuracion
$config = require $root_dir . "/config/app.php";

// objeto, patron singleton
$app = new Application($root_dir, $config);

// cargar archivo de rutas
require_once $root_dir . "/routes/web.php";

$app->run();
