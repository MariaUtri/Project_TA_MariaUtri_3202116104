<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="login" data-flashdata="<?= session('login'); ?>">
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info py-4 px-3">
                    <div class="inner">
                        <h1 class="fw-bold"><?= $today; ?></h1>
                        <p>Pengunjung hari ini</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success py-4 px-3">
                    <div class="inner">
                        <h1 class="fw-bold"><?= $All; ?></h1>
                        <p>Total Pengunjung</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning py-4 px-3">
                    <div class="inner">
                        <h1 class="fw-bold"><?= $produk; ?></h1>
                        <p>Produk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger py-4 px-3">
                    <div class="inner">
                        <h1 class="fw-bold"><?= $jasa; ?></h1>
                        <p>Jasa</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-helmet-safety"></i>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <!-- Small Box (Stat card) -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->