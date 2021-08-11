<?php

return [
    'db' => [
        'driver' => $_ENV['DB_DRIVER'],
        'user' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'database' => $_ENV['DB_DATABASE'],
        'host' => $_ENV['DB_HOST'],
        'port' => $_ENV['DB_PORT'],
        'charset' => $_ENV['DB_CHARSET']
    ],
    'mail' => [],
    'asset' => []
];
