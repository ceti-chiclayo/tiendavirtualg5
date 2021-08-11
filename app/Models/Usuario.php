<?php

namespace App\Models;

use Core\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;

    protected $table = 'usuarios';

    public function getAvatarAttribute()
    {
        return "https://ui-avatars.com/api/?background=random&name=" . urlencode($this->nombre_completo);
    }

    protected function encriptarPassword()
    {
        return password_hash($this->password, PASSWORD_DEFAULT);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function registrar(): bool
    {
        try {
            $sql = "INSERT INTO usuarios(email, password, nombre_completo, cliente_id) VALUES(:email, :password, :nombre_completo, :cliente_id)";
            $consultaPreparada = Application::$contenedor->db->pdo->prepare($sql);
            $consultaPreparada->bindValue(":email", $this->email);
            $consultaPreparada->bindValue(":password", $this->encriptarPassword());
            $consultaPreparada->bindValue(":nombre_completo", $this->nombre_completo);
            $consultaPreparada->bindValue(":cliente_id", $this->cliente_id);
            $consultaPreparada->execute();
            return true;
        } catch (\Exception $error) {
            echo $error->getMessage();
            exit;
            return false;
        }
    }

    public function login(): bool
    {
        try {
            $sql = "SELECT nombre_completo, id, email, password  FROM usuarios WHERE email=:email";
            $statement = Application::$contenedor->db->pdo->prepare($sql);
            $statement->bindValue(":email", $this->email);
            $statement->execute();
            $usuario = $statement->fetchObject(__CLASS__); // 
            if (!$usuario) {
                return false;
            }
            if (!password_verify($this->password, $usuario->password)) {
                return false;
            }
            session()->set('usuario', $usuario->id);
            return true;
        } catch (\Exception $error) {
            echo $error->getMessage();
            return false;
        }
    }
}
