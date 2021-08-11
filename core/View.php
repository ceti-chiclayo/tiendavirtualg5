<?php

namespace Core;

class View
{

    public array $secciones = [];

    public string $layout;

    /**
     * @param string $layout
     */
    public function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }

    public function startSection(string $nombre)
    {
        $this->secciones[$nombre] = '';
        ob_start();
    }

    public function endSection(string $nombre)
    {
        $this->secciones[$nombre] = ob_get_clean();
    }

    public function section(string $nombre, string $default = '')
    {
        return $this->secciones[$nombre] ?? $default;
    }

    public function renderview(string $view, array $parametros = [])
    {
        $viewContent = $this->renderViewOnly($view, $parametros);
        $layoutContent = $this->layoutContent();
        return str_replace("{{contenido}}", $viewContent, $layoutContent);
    }

    public function renderViewOnly(string $view, array $parametros)
    {
        foreach ($parametros as $indice => $value) {
            $$indice = $value;
        }

        ob_start();
        require Application::$ROOT_DIR . "/views/" . $view . ".php";
        return ob_get_clean();
    }

    public function layoutContent()
    {
        ob_start();
        require_once Application::$ROOT_DIR . "/views/layouts/" . $this->layout . ".php";
        return ob_get_clean();
    }
}
