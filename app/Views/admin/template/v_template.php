<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?> | Berkah Pintu Kreasi</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- fontawasome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('bootstrap4'); ?>/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="<?= base_url('asset-admin'); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?= base_url('asset-admin'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('asset-admin'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('asset-admin'); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


    <!-- my css -->
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/dist/css/mystyle.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button type="button" class="btn btn-white" data-toggle="modal" data-target="#logout">
                        Logout
                        <i class="fas fa-right-to-bracket"></i>
                    </button>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary base-bg elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('admin/dashboard'); ?>" class="brand-link">
                <img src="<?= base_url('asset-admin'); ?>/dist/img/bpk-logo.png" alt="Berkah Pintu Kreasi Logo"
                    class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light text-white">Berkah Pintu Kreasi</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('asset-admin'); ?>/dist/img/userdf.png" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?= base_url('admin/profil-pengguna'); ?>"
                            class="d-block text-white"><?= $username; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/dashboard'); ?>"
                                class="nav-link  <?php echo isset($page) && $page == 'admin/dashboard/v_dashboard' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/profil-perusahaan'); ?>"
                                class="nav-link  <?= (isset($page) && in_array($page, ['admin/profil-perusahaan/v_profil', 'admin/profil-perusahaan/v_tambah', 'admin/profil-perusahaan/v_edit'])) ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                    Profil Perusahaan
                                </p>
                            </a>
                        </li>
                        <li
                            class="nav-item  <?php echo (isset($page) && in_array($page, ['admin/produk/v_katProduk', 'admin/produk/v_produk', 'admin/produk/v_tambah', 'admin/produk/v_edit'])) ? 'menu-open' : ''; ?>">
                            <a href="#"
                                class="nav-link  <?php echo (isset($page) && in_array($page, ['admin/produk/v_katProduk', 'admin/produk/v_produk', 'admin/produk/v_tambah', 'admin/produk/v_edit'])) ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-cubes"></i>
                                <p>
                                    Produk
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/kategori-produk'); ?>"
                                        class="nav-link <?php echo isset($page) && $page == 'admin/produk/v_katProduk' ? 'active' : ''; ?>">
                                        <div class="ms-4">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Kategori Produk</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('admin/daftar-produk'); ?>"
                                        class="nav-link   <?php echo (isset($page) && in_array($page, ['admin/produk/v_produk', 'admin/produk/v_tambah', 'admin/produk/v_edit'])) ? 'active' : ''; ?>">
                                        <div class="ms-4">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Daftar Produk</p>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/daftar-jasa'); ?>"
                                class="nav-link <?php echo (isset($page) && in_array($page, ['admin/jasa/v_jasa', 'admin/jasa/v_sampel', 'admin/jasa/v_komponen'])) ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-helmet-safety"></i>
                                <p>
                                    Jasa
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/dokumentasi'); ?>"
                                class="nav-link <?php echo isset($page) && $page == 'admin/dokumentasi/v_dokumentasi' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-image"></i>
                                <p>
                                    Dokumentasi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/kontak'); ?>"
                                class="nav-link <?php echo isset($page) && $page == 'admin/kontak/v_kontak' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-address-card"></i>
                                <p>
                                    Kontak
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/distributor'); ?>"
                                class="nav-link  <?php echo isset($page) && $page == 'admin/kerja-sama/v_kerjasama' ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-handshake"></i>
                                <p>
                                    Kerja Sama
                                </p>
                            </a>
                        </li>
                        <?php if ($role == 'Admin'): ?>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/kelola-pengguna'); ?>"
                                    class="nav-link <?php echo isset($page) && $page == 'admin/kelola-pengguna/v_kelolaPengguna' ? 'active' : ''; ?>">
                                    <i class=" nav-icon fas fa-users-gear"></i>
                                    <p>
                                        Kelola Pengguna
                                    </p>
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="error" data-flashdata="<?= session('error'); ?>"></div>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $title; ?></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <?php
                        if ($page) {
                            echo view($page);
                        } ?>

                        <div class="error" data-flashdata="<?= session('tolak'); ?>"></div>

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
            <!-- modal logout -->
            <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Yakin Keluar dari Dashboard Berkah Pintu Kreasi?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            <a href="<?= base_url('/logout'); ?>" type="button" class="btn btn-primary px-4">Ya</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2024 <b class="text-primary">BerkahPintuKreasi</b>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('asset-admin'); ?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="<?= base_url('asset-admin'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('asset-admin'); ?>/dist/js/adminlte.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('asset-admin'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('asset-admin'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script
        src="<?= base_url('asset-admin'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script
        src="<?= base_url('asset-admin'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('asset-admin'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('asset-admin'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('asset-admin'); ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('asset-admin'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('asset-admin'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('asset-admin'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('asset-admin'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('asset-admin'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- sweet alert -->
    <script src="<?= base_url('asset-admin'); ?>/js-dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('asset-admin'); ?>/js-dist/myscript.js"></script>
    <!-- auto-height -->
    <!-- auto height textarea -->
    <!-- profil perusahaan -->
    <?php if ($page == 'admin/profil-perusahaan/v_tambah' || $page == 'admin/profil-perusahaan/v_edit'): ?>
        <script>
            const sejarah = document.getElementById('sejarah');

            sejarah.addEventListener('input', function () {
                this.style.height = 'auto'; // Reset height
                this.style.height = this.scrollHeight + 'px'; // Set new height
            });

            const visi = document.getElementById('visi');

            visi.addEventListener('input', function () {
                this.style.height = 'auto'; // Reset height
                this.style.height = this.scrollHeight + 'px'; // Set new height
            });

            const misi = document.getElementById('misi');

            misi.addEventListener('input', function () {
                this.style.height = 'auto'; // Reset height
                this.style.height = this.scrollHeight + 'px'; // Set new height
            })
        </script>
    <?php endif; ?>

    <!-- Daftar Produk -->
    <?php if ($page == 'admin/produk/v_tambah' || $page == 'admin/produk/v_edit'): ?>
        <script>
            const bahan = document.getElementById('bahan');

            bahan.addEventListener('input', function () {
                this.style.height = 'auto'; // Reset height
                this.style.height = this.scrollHeight + 'px'; // Set new height
            });

            const ukuran = document.getElementById('ukuran');

            ukuran.addEventListener('input', function () {
                this.style.height = 'auto'; // Reset height
                this.style.height = this.scrollHeight + 'px'; // Set new height
            });

        </script>
    <?php endif; ?>

    <!-- Dokumentasi -->
    <?php if ($page == 'admin/dokumentasi/v_dokumentasi'): ?>
        <script>
            const deskripsi = document.getElementById('deskripsi');

            deskripsi.addEventListener('input', function () {
                this.style.height = 'auto'; // Reset height
                this.style.height = this.scrollHeight + 'px'; // Set new height
            });
        </script>

        <script>
            const editDeskripsi = document.getElementById('editDeskripsi');

            editDeskripsi.addEventListener('input', function () {
                this.style.height = 'auto'; // Reset height
                this.style.height = this.scrollHeight + 'px'; // Set new height
            });
        </script>
    <?php endif; ?>

    <?php if ($page == 'admin/kelola-pengguna/v_kelolaPengguna'): ?>
        <script>
            function updatePassword() {
                var username = document.getElementById('username').value;
                document.getElementById('password').value = username;
            }
        </script>
    <?php endif; ?>
    <!-- searching form -->
    <script>
        $(function () {
            $('#dataTables').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

</body>

</html>