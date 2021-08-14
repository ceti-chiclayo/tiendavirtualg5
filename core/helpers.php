<?php

use Core\Application;

if (!function_exists("response")) {
    function response(): \Core\Response
    {
        return Application::$contenedor->response;
    }
}

if (!function_exists('view')) {
    /**
     * Función para una vista con layout
     *
     * @param string $view
     * @param array $parametros
     * @return string
     */
    function view(string $view, array $parametros = []): string
    {
        return Application::$contenedor->view->renderview($view, $parametros);
    }
}

if (!function_exists('viewOnly')) {
    /**
     * Función para retornar solo la vista, sin layout
     *
     * @param string $view
     * @param array $parametros
     * @return string
     */
    function viewOnly(string $view, array $parametros = []): string
    {
        return Application::$contenedor->view->renderViewOnly($view, $parametros);
    }
}

if (!function_exists('session')) {
    function session(): \Core\Session
    {
        return Application::$contenedor->session;
    }
}

/**
 * Function para generar url para archivos estaticos
 */
if (!function_exists('asset')) {
    function asset(string $asset): string
    {
        $asset_url = $_ENV['ASSETS_URL'];
        return $asset_url . '/' . $asset;
    }
}


if (!function_exists('viewComponent')) {
    function viewComponent(string $component, ...$parametros)
    {
        // BannerArea, CarritoVenta
        $class = "\\App\\View\\Components\\" . $component . "Component";
        $objeto = new $class(...$parametros);
        return $objeto->render();
    }
}

if (!function_exists('auth')) {
    function auth(): \Core\Authentication
    {
        return \Core\Application::$contenedor->auth;
    }
}

if (!function_exists('mailer')) {
    function mailer(): \Core\Mailer
    {
        return \Core\Application::$contenedor->mailer;
    }
}

