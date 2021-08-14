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
        foreach ($_GET as $key => $value) {
            $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        foreach ($_POST as $key => $value) {
            $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $body;
    }

    public function getUrlPeticion()
    {
        return $_SERVER['HTTP_REFERER'] ?? '/';
    }
}
