<?php

namespace App\Models;

use Core\Application;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    public function registrar(): bool
    {
        try {
            $sql = "INSERT INTO clientes(apellido_paterno, apellido_materno, nombres, email) values (?, ?, ?, ?)";
            $statement = Application::$contenedor->db->pdo->prepare($sql);
            $statement->bindValue(1, $this->apellido_paterno);
            $statement->bindValue(2, $this->apellido_materno);
            $statement->bindValue(3, $this->nombres);
            $statement->bindValue(4, $this->email);
            $resultado = $statement->execute();
            if ($resultado) {
                $this->id = Application::$contenedor->db->pdo->lastInsertId();
                return true;
            }
        } catch (\Exception $error) {
            return false;
        }
    }

    public function nombreCompleto()
    {
        return "$this->apellido_paterno $this->apellido_materno $this->nombres";
    }

    public function getNombreCompletoAttribute()
    {
        return "$this->apellido_paterno $this->apellido_materno $this->nombres";
    }
}
