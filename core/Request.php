<?php

namespace Core;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Request extends SymfonyRequest
{

    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '';
        $posicion = strpos($path, '?');
        if ($posicion === false) {
            return $path;
        }
        return substr($path, 0, $posicion);
    }

    public function getMethod(): string
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? '';
        return strtolower($method);
    }

    public function isGet(): bool
    {
        return $this->getMethod() === 'get';
    }

    public function isPost(): bool
    {
        return $this->getMethod() === 'post';
    }

    public function getBody(): array
    {
        $body = [];
        if ($this->isGet()) {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }

    /**
     * Buscar la existencia de un parametros
     *
     * @param [type] $key
     * @param [type] $default
     * @return void
     */
    public function get($key, $default = null)
    {
        return $this->getBody()[$key] ?? $default;
    }
}
