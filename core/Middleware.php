<?php

namespace Core;

abstract class Middleware
{
    protected array $funciones;

    public function __construct(array $funciones = [])
    {
        $this->funciones = $funciones;
    }

    abstract public function execute();

    /**
     * @return array
     */
    public function getFunciones(): array
    {
        return $this->funciones;
    }
}
