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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('bootstrap4'); ?>/css/bootstrap.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/dist/css/adminlte.min.css">
    <!-- mystyle css -->
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/dist/css/mystyle.css">
</head>


<body class="hold-transition body-bg align-item-centered">
    <div class="container px-3 py-5 mt-3">
        <div class="row full-screen-row rounded-4">
            <div
                class="col-lg-6 base-bg-lg rounded-start-4 d-flex flex-column justify-content-end align-items-end position-relative ">
                <div class="me-auto ms-auto w-100 d-flex flex-column align-items-center img-display">
                    <h1 class="fw-bold text-white img-display">Berkah Pintu Kreasi</h1>
                </div>
                <img src="<?= base_url('asset-admin'); ?>/dist/img/logo.png" alt="Logo Berkah Pintu Kreasi"
                    class="img-size img-display">
            </div>
            <div class="col-lg-6 bg-white rounded-4 px-3">
                <div class="d-flex justify-content-center mt-5 mb-2">
                    <img src="<?= base_url('asset-admin'); ?>/dist/img/bpk-logo.png" alt="" class="img-logo">
                </div>
                <div class="text-center">
                    <p class="login-logo">
                        <b class="fs-3">Login</b> <br>
                        <b class="fs-4">Berkah Pintu Kreasi</b>
                    </p>
                </div>
                <div class="container px-3">
                    <?php if (session()->getFlashdata('msg')): ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-circle"></i>
                            <?= session()->getFlashdata('msg') ?>
                        </div>
                    <?php endif; ?>
                    <div class="error" data-flashdata="<?= session('error'); ?>"></div>
                    <div class="flash-data" data-flashdata="<?= session('message'); ?>">
                        <?php if (session()->getFlashdata('gagal')): ?>
                            <div class="alert alert-danger" role="alert">
                                <i class="fas fa-circle-check"></i>
                                <?= session()->getFlashdata('gagal') ?>
                            </div>
                        <?php endif; ?>
                        <form id="login" action="<?= base_url('/login/auth'); ?>" method="post">
                            <?= csrf_field(); ?>
                            <?php $errors = session()->getFlashdata('errors'); ?>
                            <div class="input-group">
                                <input type="text" name="username" id="username"
                                    class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>"
                                    placeholder="Username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                                <?php if (isset($errors['username'])): ?>
                                    <div class="invalid-feedback"><?= $errors['username']; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="input-group mt-3">
                                <input type="password" name="password" id="password"
                                    class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                                    placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <?php if (isset($errors['password'])): ?>
                                    <div class="invalid-feedback"><?= $errors['password']; ?></div>
                                <?php endif; ?>

                            </div>
                            <div class="row mb-3 mt-3">
                                <div class="col-8">
                                    <p class="mb-1">
                                        <a href="<?= base_url('/lupa-password'); ?>">Lupa Password?</a>
                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>





        <!-- jQuery -->
        <script src="<?= base_url('asset-admin'); ?>/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url('asset-admin'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('asset-admin'); ?>/dist/js/adminlte.min.js"></script>
        <!-- sweet alert -->
        <script src="<?= base_url('asset-admin'); ?>/js-dist/sweetalert2.all.min.js"></script>
        <script src="<?= base_url('asset-admin'); ?>/js-dist/myscript.js"></script>
        <!-- validasi myjs -->
        <!-- <script src="<?= base_url('validasi'); ?>/js/login.js"></script> -->
</body>



</html>