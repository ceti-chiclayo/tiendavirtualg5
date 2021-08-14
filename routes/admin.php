<?php

/** @var \Core\Application $app */

// rutas parte administrativa
# Registro de usuarios
//$app->router->get('/registro', [\App\Controllers\RegistroController::class, 'formularioRegistro']);
//$app->router->post('/registro', [\App\Controllers\RegistroController::class, 'registro']);

# Inicio de sesión: autenticación
$app->router->get('/login', [\App\Controllers\LoginController::class, 'formularioLogin']);
$app->router->post('/login', [\App\Controllers\LoginController::class, 'login']);

# Logout
$app->router->post('/logout', [\App\Controllers\LogoutController::class, 'logout']);

# Dashboard
$app->router->get('/dashboard', [\App\Controllers\DashboardController::class, 'dashboard']);

# Categorias => CRUD, Create, Read, Update, Delete

# Rutas categorias
$app->router->get('/categorias', [\App\Controllers\CategoriaController::class, 'index']);
$app->router->get('/categorias/search', [\App\Controllers\CategoriaController::class, 'search']);
$app->router->get('/categorias/create', [\App\Controllers\CategoriaController::class, 'create']);
$app->router->post('/categorias/store', [\App\Controllers\CategoriaController::class, 'store']);
$app->router->get('/categorias/edit/{categoria_id}', [\App\Controllers\CategoriaController::class, 'edit']);
$app->router->post('/categorias/update/{categoria_id}', [\App\Controllers\CategoriaController::class, 'update']);
$app->router->post('/categorias/destroy/{categoria_id}', [\App\Controllers\CategoriaController::class, 'destroy']);
$app->router->get('/categorias/reportepdf', [\App\Controllers\CategoriaController::class, 'reportePdf']);
$app->router->get('/categorias/reporteexcel', [\App\Controllers\CategoriaController::class, 'reporteExcel']);

# Rutas subcategorias
$app->router->get('/subcategorias', [\App\Controllers\SubCategoriaController::class, 'index']);
$app->router->get('/subcategorias/search', [\App\Controllers\SubCategoriaController::class, 'search']);
$app->router->get('/subcategorias/create', [\App\Controllers\SubCategoriaController::class, 'create']);
$app->router->post('/subcategorias/store', [\App\Controllers\SubCategoriaController::class, 'store']);
$app->router->get('/subcategorias/edit/{categoria_id}', [\App\Controllers\SubCategoriaController::class, 'edit']);
$app->router->post('/subcategorias/update/{categoria_id}', [\App\Controllers\SubCategoriaController::class, 'update']);
$app->router->post('/subcategorias/destroy/{categoria_id}', [\App\Controllers\SubCategoriaController::class, 'destroy']);
$app->router->get('/subcategorias/reportepdf', [\App\Controllers\SubCategoriaController::class, 'reportePdf']);
$app->router->get('/subcategorias/reporteexcel', [\App\Controllers\SubCategoriaController::class, 'reporteExcel']);

# Rutas marcas
$app->router->get('/marcas', [\App\Controllers\MarcaController::class, 'index']);
$app->router->get('/marcas/search', [\App\Controllers\MarcaController::class, 'search']);
$app->router->get('/marcas/create', [\App\Controllers\MarcaController::class, 'create']);
$app->router->post('/marcas/store', [\App\Controllers\MarcaController::class, 'store']);
$app->router->get('/marcas/edit/{marca_id}', [\App\Controllers\MarcaController::class, 'edit']);
$app->router->post('/marcas/update/{marca_id}', [\App\Controllers\MarcaController::class, 'update']);
$app->router->post('/marcas/destroy/{marca_id}', [\App\Controllers\MarcaController::class, 'destroy']);

# Rutas colores
$app->router->get('/colores', [\App\Controllers\ColorController::class, 'index']);
$app->router->get('/colores/search', [\App\Controllers\ColorController::class, 'search']);
$app->router->get('/colores/create', [\App\Controllers\ColorController::class, 'create']);
$app->router->post('/colores/store', [\App\Controllers\ColorController::class, 'store']);
$app->router->get('/colores/edit/{color_id}', [\App\Controllers\ColorController::class, 'edit']);
$app->router->post('/colores/update/{color_id}', [\App\Controllers\ColorController::class, 'update']);
$app->router->post('/colores/destroy/{color_id}', [\App\Controllers\ColorController::class, 'destroy']);

# Rutas medidas
$app->router->get('/medidas', [\App\Controllers\MedidaController::class, 'index']);
$app->router->get('/medidas/search', [\App\Controllers\MedidaController::class, 'search']);
$app->router->get('/medidas/create', [\App\Controllers\MedidaController::class, 'create']);
$app->router->post('/medidas/store', [\App\Controllers\MedidaController::class, 'store']);
$app->router->get('/medidas/edit/{medida_id}', [\App\Controllers\MedidaController::class, 'edit']);
$app->router->post('/medidas/update/{medida_id}', [\App\Controllers\MedidaController::class, 'update']);
$app->router->post('/medidas/destroy/{medida_id}', [\App\Controllers\MedidaController::class, 'destroy']);


# Rutas productos
$app->router->get('/productos', [\App\Controllers\ProductoController::class, 'index']);
$app->router->get('/productos/search', [\App\Controllers\ProductoController::class, 'search']);
$app->router->get('/productos/create', [\App\Controllers\ProductoController::class, 'create']);
$app->router->post('/productos/store', [\App\Controllers\ProductoController::class, 'store']);
$app->router->get('/productos/edit/{producto_id}', [\App\Controllers\ProductoController::class, 'edit']);
$app->router->post('/productos/update/{producto_id}', [\App\Controllers\ProductoController::class, 'update']);
$app->router->post('/productos/destroy/{producto_id}', [\App\Controllers\ProductoController::class, 'destroy']);
# Rutas productos: presentaciones
$app->router->get('/productos/create/load_subcategorias/{categoria_id}', [\App\Controllers\ProductoController::class, 'loadSubcategorias']);
$app->router->get('/productos/create/listar_presentaciones', [\App\Controllers\ProductoController::class, 'createListarPresentaciones']);
$app->router->get('/productos/create/modal_presentacion', [\App\Controllers\ProductoController::class, 'createModalPresentacion']);
$app->router->get('/productos/create/modal_edit_presentacion/{position}', [\App\Controllers\ProductoController::class, 'modalEditPresentacion']);
$app->router->post('/productos/create/add_presentacion', [\App\Controllers\ProductoController::class, 'addPresentacion']);
$app->router->post('/productos/create/edit_presentacion/{position}', [\App\Controllers\ProductoController::class, 'editPresentacion']);
$app->router->post('/productos/create/remove_presentacion/{position}', [\App\Controllers\ProductoController::class, 'removePresentacion']);


# Rutas medidas
$app->router->get('/usuarios', [\App\Controllers\UsuarioController::class, 'index']);
$app->router->get('/usuarios/search', [\App\Controllers\UsuarioController::class, 'search']);
$app->router->get('/usuarios/create', [\App\Controllers\UsuarioController::class, 'create']);
$app->router->post('/usuarios/store', [\App\Controllers\UsuarioController::class, 'store']);
$app->router->get('/usuarios/edit/{usuario_id}', [\App\Controllers\UsuarioController::class, 'edit']);
$app->router->post('/usuarios/update/{usuario_id}', [\App\Controllers\UsuarioController::class, 'update']);
$app->router->post('/usuarios/destroy/{usuario_id}', [\App\Controllers\UsuarioController::class, 'destroy']);

# Rutas clientes
$app->router->get('/clientes', [\App\Controllers\ClienteController::class, 'index']);
$app->router->get('/clientes/search', [\App\Controllers\ClienteController::class, 'search']);
$app->router->get('/clientes/create', [\App\Controllers\ClienteController::class, 'create']);
$app->router->post('/clientes/store', [\App\Controllers\ClienteController::class, 'store']);
$app->router->get('/clientes/edit/{cliente_id}', [\App\Controllers\ClienteController::class, 'edit']);
$app->router->post('/clientes/update/{cliente_id}', [\App\Controllers\ClienteController::class, 'update']);
$app->router->post('/clientes/destroy/{cliente_id}', [\App\Controllers\ClienteController::class, 'destroy']);

# Rutas proveedores
$app->router->get('/proveedores', [\App\Controllers\ProveedorController::class, 'index']);
$app->router->get('/proveedores/search', [\App\Controllers\ProveedorController::class, 'search']);
$app->router->get('/proveedores/create', [\App\Controllers\ProveedorController::class, 'create']);
$app->router->post('/proveedores/store', [\App\Controllers\ProveedorController::class, 'store']);
$app->router->get('/proveedores/edit/{proveedor_id}', [\App\Controllers\ProveedorController::class, 'edit']);
$app->router->post('/proveedores/update/{proveedor_id}', [\App\Controllers\ProveedorController::class, 'update']);
$app->router->post('/proveedores/destroy/{proveedor_id}', [\App\Controllers\ProveedorController::class, 'destroy']);

# Compras
$app->router->get('/compras', [\App\Controllers\CompraController::class, 'index']);
$app->router->get('/compras/search', [\App\Controllers\CompraController::class, 'search']);
$app->router->get('/compras/create', [\App\Controllers\CompraController::class, 'create']);
$app->router->post('/compras/store', [\App\Controllers\CompraController::class, 'store']);
//$app->router->get('/compras/edit/{compra_id}', [\App\Controllers\CompraController::class, 'edit']);
//$app->router->post('/compras/update/{compra_id}', [\App\Controllers\CompraController::class, 'update']);
//$app->router->post('/compras/destroy/{compra_id}', [\App\Controllers\CompraController::class, 'destroy']);

# detalle de compra carrito
$app->router->get('/compras/create/listar_detalle', [\App\Controllers\CompraController::class, 'listarDetalle']);
$app->router->get('/compras/create/modal_item', [\App\Controllers\CompraController::class, 'formAgregarItem']);
$app->router->get('/compras/create/modal_edit_item/{indice}', [\App\Controllers\CompraController::class, 'formEditarItem']);
$app->router->post('/compras/create/agregar_item', [\App\Controllers\CompraController::class, 'agregarItem']);
$app->router->post('/compras/create/edit_item/{indice}', [\App\Controllers\CompraController::class, 'actualizarItem']);
$app->router->post('/compras/create/eliminar_item/{indice}', [\App\Controllers\CompraController::class, 'eliminarItem']);
$app->router->get('/compras/create/cargar_presentaciones/{producto_id}', [\App\Controllers\CompraController::class, 'cargarPresentaciones']);

# Sucursales
$app->router->get('/sucursales', [\App\Controllers\SucursalController::class, 'index']);
$app->router->get('/sucursales/search', [\App\Controllers\SucursalController::class, 'search']);
$app->router->get('/sucursales/create', [\App\Controllers\SucursalController::class, 'create']);
$app->router->post('/sucursales/store', [\App\Controllers\SucursalController::class, 'store']);
$app->router->get('/sucursales/edit/{sucursal_id}', [\App\Controllers\SucursalController::class, 'edit']);
$app->router->post('/sucursales/update/{sucursal_id}', [\App\Controllers\SucursalController::class, 'update']);
$app->router->post('/sucursales/destroy/{sucursal_id}', [\App\Controllers\SucursalController::class, 'destroy']);

# Cupones
$app->router->get('/cupones', [\App\Controllers\CuponController::class, 'index']);
$app->router->get('/cupones/search', [\App\Controllers\CuponController::class, 'search']);
$app->router->get('/cupones/create', [\App\Controllers\CuponController::class, 'create']);
$app->router->post('/cupones/store', [\App\Controllers\CuponController::class, 'store']);
$app->router->get('/cupones/edit/{cupon_id}', [\App\Controllers\CuponController::class, 'edit']);
$app->router->post('/cupones/update/{cupon_id}', [\App\Controllers\CuponController::class, 'update']);
$app->router->post('/cupones/destroy/{cupon_id}', [\App\Controllers\CuponController::class, 'destroy']);

# Perfil
$app->router->get('/perfil', [\App\Controllers\PerfilController::class, 'index']);
$app->router->post('/perfil/actualizar', [\App\Controllers\PerfilController::class, 'update']);

# Recuperar contraseña
$app->router->get('/solicitar-cambio-password', [\App\Controllers\RecuperarPasswordController::class, 'formularioRecuperar']);
$app->router->post('/solicitar-cambio-password', [\App\Controllers\RecuperarPasswordController::class, 'solicitarRecuperar']);
$app->router->get('/cambiar-password/{token}', [\App\Controllers\RecuperarPasswordController::class, 'formularioCambiar']);
$app->router->post('/cambiar-password', [\App\Controllers\RecuperarPasswordController::class, 'cambiarPassword']);
