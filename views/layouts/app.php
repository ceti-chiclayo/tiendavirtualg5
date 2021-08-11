<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Tienda Virtual</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= asset('plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= asset('plugins/toastr/toastr.min.css') ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= asset('plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= asset('dist/css/adminlte.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <?php require_once \Core\Application::$ROOT_DIR . "/views/layouts/partials/navbar.php" ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php require_once \Core\Application::$ROOT_DIR . "/views/layouts/partials/sidebar.php" ?>

    <!-- Content Wrapper. Contains page content -->
    {{contenido}}
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <?php require_once \Core\Application::$ROOT_DIR . "/views/layouts/partials/control-sidebar.php" ?>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?php require_once \Core\Application::$ROOT_DIR . "/views/layouts/partials/footer.php" ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- Axios: Peticiones Ajax -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
</script>
<!-- jQuery -->
<script src="<?= asset('plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= asset('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- SweetAlert2 -->
<script src="<?= asset('plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- Toastr -->
<script src="<?= asset('plugins/toastr/toastr.min.js') ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= asset('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<!-- jquery-validation -->
<script src="<?= asset('plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?= asset('plugins/jquery-validation/additional-methods.min.js') ?>"></script>
<script src="<?= asset('plugins/jquery-validation/localization/messages_es_PE.js') ?>"></script>
<!-- Select2 -->
<script src="<?= asset('plugins/select2/js/select2.full.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= asset('dist/js/adminlte.min.js') ?>"></script>
<!-- JS de Aplicacion -->
<script src="<?= asset('js/app.js') ?>"></script>
<script>
    /**
     * Jquery Datatables configuraciones por defecto
     */
    $.extend(true, $.fn.dataTable.defaults, {
        searching: false,
        ordering: false,
        pageLength: 50,
        lengthMenu: [15, 30, 50, 100],
        language: {
            url: "/json/datatables/es_es.json"
        }
    });

    /**
     * Jquery validate configuraciones por defecto
     */
    jQuery.validator.setDefaults({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.div-input').append(error);
        },
        highlight: function (element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('is-invalid');
        }
    });

    /**
     * Mostrar menú actualmente seleccionado
     */
    const menu_activo = $('.nav-link.active');
    if (menu_activo.length) {
        menu_activo.parent().parent().parent().children().addClass('active');
        menu_activo.parent().parent().parent().addClass('menu-is-opening menu-open');
    }
</script>
<?php echo $this->section('javascript-extra') ?>
</body>

</html>