<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cambiar contraseña | CETI Store</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="/" class="h1"><b>CETI</b>Store</a>
        </div>
        <div class="card-body">
            <?php if ($error !== false): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php else: ?>
                <p class="login-box-msg">Está a solo un paso de su nueva contraseña, recupere su contraseña ahora.</p>
                <form id="formulario" action="/cambiar-password" method="post">
                    <input type="hidden" name="token" value="<?= $token ?>">
                    <div class="input-group mb-3">
                        <input type="email" required
                               class="form-control <?= (isset(session()->getFlash('errores')['email'])) ? 'is-invalid' : '' ?>"
                               placeholder="Correo electrónico" name="email"
                               value="<?= $email ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <?php if (isset(session()->getFlash('errores')['email'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlash('errores')['email'][0] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" required
                               class="form-control <?= (isset(session()->getFlash('errores')['password'])) ? 'is-invalid' : '' ?>"
                               name="password" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <?php if (isset(session()->getFlash('errores')['password'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlash('errores')['password'][0] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" required
                               class="form-control <?= (isset(session()->getFlash('errores')['password_confirmacion'])) ? 'is-invalid' : '' ?>"
                               name="password_confirmacion"
                               placeholder="Confirmar contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <?php if (isset(session()->getFlash('errores')['password_confirmacion'])): ?>
                            <div class="invalid-feedback">
                                <?= session()->getFlash('errores')['password_confirmacion'][0] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button id="button-submit" type="submit" class="btn btn-primary btn-block">Cambiar
                                contraseña
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            <?php endif; ?>
            <p class="mt-3 mb-1">
                <a href="/login">Login</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
    document.getElementById('fomrulario').addEventListener('submit', function (evento) {
        evento.preventDefault();
        document.getElementById('button-submit').disabled = true;
        evento.submit();
    })
</script>
</body>
</html>
