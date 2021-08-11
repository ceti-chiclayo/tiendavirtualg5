<?php

namespace Core;

class Database
{
    protected string $usuario;
    protected string $password;
    protected string $puerto;
    protected string $host;
    protected string $database;
    protected string $driver;
    protected string $charset;
    public \PDO $pdo;

    public function __construct(array $config = [])
    {
        $this->usuario = $config['user'];
        $this->password = $config['password'];
        $this->puerto = $config['port'];
        $this->host = $config['host'];
        $this->database = $config['database'];
        $this->driver = $config['driver'];
        $this->charset = $config['charset'];

        $dsn = "$this->driver:dbname=$this->database;host=$this->host;port=$this->puerto;charset=$this->charset"; // latin1
        $this->pdo = new \PDO($dsn, $this->usuario, $this->password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
}
