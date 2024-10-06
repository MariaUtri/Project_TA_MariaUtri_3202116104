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
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('bootstrap4'); ?>/css/bootstrap.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/dist/css/adminlte.min.css">
    <!-- mystyle css -->
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/dist/css/mystyle.css">
</head>

<body class="hold-transition body-bg login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-center mt-5 mb-2">
                    <img src="<?= base_url('asset-admin'); ?>/dist/img/bpk-logo.png" alt="" class="img-logo">
                </div>
                <div class="text-center">Lupa Password</div>
            </div>

            <div class="card-body login-card-body">
                <p class="login-box-msg">Masukkan email anda untuk mendapatkan link reset password</p>
                <div class="error" data-flashdata="<?= session('error'); ?>"></div>
                <?php if (session('gagal')): ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-circle-exclamation"></i>
                        <?= session('gagal') ?>
                    </div>
                <?php endif; ?>
                <?php if (session('berhasil')): ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fas fa-circle-check"></i>
                        <?= session('berhasil') ?>
                    </div>
                <?php endif; ?>
                <form id="lupaPwd" action="<?= base_url('/send-email'); ?>" method="post">
                    <?php $errors = session()->getFlashdata('errors'); ?>
                    <?= csrf_field(); ?>
                    <div class="input-group">
                        <input type="text" name="email" id="email"
                            class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <?php if (isset($errors['email'])): ?>
                            <div class="invalid-feedback"><?= $errors['email']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="row mb-3 mt-3">
                        <div class="col-8">
                            <a href="<?= base_url('/login'); ?>">Login</a>
                        </div>
                        <div class="col-4">
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
    <!-- sweet alert -->
    <script src="<?= base_url('asset-admin'); ?>/js-dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('asset-admin'); ?>/js-dist/myscript.js"></script>
</body>

</html>