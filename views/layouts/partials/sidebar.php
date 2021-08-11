<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="<?= asset('dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Tienda Virtual</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= auth()->user()->avatar ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/perfil" class="d-block"><?= auth()->user()->nombre_completo ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Personas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/usuarios" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/clientes" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Clientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/proveedores" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Proveedores</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>
                            Productos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/categorias" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categorías</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/subcategorias" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Subcategorías</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/marcas" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Marcas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/medidas" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Medidas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/colores" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Colores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/productos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Productos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Operaciones
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/sucursales" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sucursales</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/cupones" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cupones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/compras" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Compras</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pedidos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pedidos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/envios" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Envios</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/perfil" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Perfil
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>