<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- fontawasome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Boostrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/dist/css/adminlte.min.css">
    <!-- mystyle css -->
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/dist/css/mystyle.css">
    <link rel="stylesheet" href="<?= base_url('validasi'); ?>/css/style.css">
</head>

<body class="hold-transition body-bg login-page">
    <div class="login-box">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-center mt-5 mb-2">
                    <img src="<?= base_url('asset-admin'); ?>/dist/img/bpk-logo.png" alt="" class="img-logo">
                </div>
                <div class="text-center">Reset Password</div>
            </div>
            <div class="card-body login-card-body">
                <?php if (session('gagal')): ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-circle-exclamation"></i>
                        <?= session('gagal') ?>
                    </div>
                <?php endif; ?>
                <form id="resetForm" action="<?= base_url('resetpassword'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="username" value="<?= $username ?>">
                    <input type="hidden" name="token" value="<?= $reset_token ?>">
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Masukkan password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="error-message" id="pwdError"></div>
                    <div class="input-group mt-3">
                        <input type="password" name="password_confirm" id="password_confirm" class="form-control"
                            placeholder="Konfirmasi Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="error-message" id="pwdcError"></div>
                    <div class="row mt-3">
                        <div class="col-4 ms-auto">
                            <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>







    <!-- jQuery -->
    <script src="<?= base_url('asset-admin'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('asset-admin'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('asset-admin'); ?>/dist/js/adminlte.min.js"></script>
    <!-- validasi myjs -->
    <script src="<?= base_url('validasi'); ?>/js/resetPwd.js"></script>
</body>

</html>