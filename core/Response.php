<?php

namespace Core;

class Response
{

    /**
     * Redireccionar a otra ruta
     *
     * @param string $url
     */
    public function redirect(string $url)
    {
        header("Location: " . $url);
        exit;
    }

    /**
     * Setter código de estado para respuesta
     *
     * @param int $code
     */
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    /**
     * Retornar un objeto de json
     *
     * @param array $datos
     * @param int $codigo_estado
     * @return false|string
     */
    public function json(array $datos = [], int $codigo_estado = 200)
    {
        $datos = json_encode($datos);
        $this->setStatusCode($codigo_estado);
        header("Content-Type: application/json; charset=utf-8");
        return $datos;
    }
}
