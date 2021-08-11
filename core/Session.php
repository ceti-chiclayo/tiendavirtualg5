<?php

namespace Core;

class Session
{
    public function __construct()
    {
        session_start();
        $mensajes_flash = $_SESSION['mensajes_flash'] ?? [];
        foreach ($mensajes_flash as $key => $value) {
            $mensajes_flash[$key]['eliminar'] = true;
        }
        $_SESSION['mensajes_flash'] = $mensajes_flash;
    }

    public function setFlash($key, $value)
    {
        $_SESSION['mensajes_flash'][$key] = [
            'valor' => $value,
            'eliminar' => false
        ];
    }

    public function getFlash($key, $default = false)
    {
        return $_SESSION['mensajes_flash'][$key]['valor'] ?? $default;
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key, $default = false)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function __destruct()
    {
        $mensajes_flash = $_SESSION['mensajes_flash'] ?? [];
        foreach ($mensajes_flash as $key => $value) {
            if ($value['eliminar']) {
                unset($mensajes_flash[$key]);
            }
        }
        $_SESSION['mensajes_flash'] = $mensajes_flash;
    }
}
