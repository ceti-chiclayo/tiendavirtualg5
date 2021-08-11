<?php

/** @var \Core\Application $app */
$app->router->get('/', [\App\Controllers\Tienda\TiendaController::class, 'inicio']);


// login-registro
$app->router->get('/login-registro', [\App\Controllers\Tienda\LoginRegistroController::class, 'formularios']);

$app->router->post('/registro-cliente', [\App\Controllers\Tienda\LoginRegistroController::class, 'registro']);
$app->router->post('/login-cliente', [\App\Controllers\Tienda\LoginRegistroController::class, 'login']);
$app->router->post('/logout-cliente', [\App\Controllers\Tienda\LoginRegistroController::class, 'logout']);

// Mi cuenta
$app->router->get('/mi-cuenta', [\App\Controllers\Tienda\MiCuentaController::class, 'inicio']);
$app->router->post('/mi-cuenta/actualizar-datos', [\App\Controllers\Tienda\MiCuentaController::class, 'actualizarDatos']);


// Pagina de pagar
$app->router->get('/pagar', [\App\Controllers\Tienda\PagarController::class, 'inicio']);
$app->router->post('/pagar/culqi', [\App\Controllers\Tienda\PagarController::class, 'culqi']);

// Pagina de busqueda de productos

// Pagina para ver detalle de un producto
$app->router->get('/detalle-producto/{slug}', [\App\Controllers\Tienda\TiendaController::class, 'detalleProducto']);

// Carrito
$app->router->get('/carrito', [\App\Controllers\Tienda\CarritoController::class, 'inicio']);
$app->router->get('/limpiar-cupon', [\App\Controllers\Tienda\CarritoController::class, 'limpiarCupon']);
$app->router->get('/carrito/generar-tabla', [\App\Controllers\Tienda\CarritoController::class, 'generarTabla']);
$app->router->post('/carrito/aplicar-cupon', [\App\Controllers\Tienda\CarritoController::class, 'aplicarCupon']);


$app->router->post('/carrito/agregar-item', [\App\Controllers\Tienda\CarritoController::class, 'agregarItem']);
$app->router->post('/carrito/quitar-item', [\App\Controllers\Tienda\CarritoController::class, 'quitarItem']);
$app->router->get('/carrito/actualizar-minicart', [\App\Controllers\Tienda\CarritoController::class, 'actualizarMinicart']);
$app->router->get('/carrito/obtener-cantidad-items', [\App\Controllers\Tienda\CarritoController::class, 'cantidadItems']);
$app->router->get('/carrito/obtener-total', [\App\Controllers\Tienda\CarritoController::class, 'calcularTotal']);
// Route::get('/carrito/obtener-total', [\App\Controllers\Tienda\CarritoController::class, 'calcularTotal']);

$app->router->get('/buscador', [\App\Controllers\Tienda\BuscadorController::class, 'filtrar']);
$app->router->get('/buscador/{categoria}', [\App\Controllers\Tienda\BuscadorController::class, 'filtrarPorCategoria']);
$app->router->get('/buscador/{categoria}/{subcategoria}', [\App\Controllers\Tienda\BuscadorController::class, 'filtrarPorSubcategoria']);