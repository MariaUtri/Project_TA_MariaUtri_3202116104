<div class="col-lg-12">
    <div class="card">
        <div class="card-header">

            <!-- Btn tambah -->
            <a href="<?= base_url('admin/daftar-produk/tambah'); ?>" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah
            </a>
            <div class="flash-data" data-flashdata="<?= session('message'); ?>">
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataTables" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width:10px;" scope="col">No</th>
                        <th>Gambar</th>
                        <th scope="col">Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                        <th>Editor</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($produk as $daftar_produk): ?>
                        <tr>
                            <td> <?= $no++; ?></td>
                            <td>
                                <img src="<?= base_url('/img-asset/produk/' . $daftar_produk->gambar_path); ?>"
                                    alt="<?= $daftar_produk->nama_produk; ?>"
                                    style="width:100px; cursor:pointer; height:100px;" data-toggle="modal"
                                    data-target="#imageModal<?= $daftar_produk->id_produk; ?>">
                            </td>
                            <td><?= $daftar_produk->nama_produk; ?></td>
                            <td><?= $daftar_produk->nama_kategori; ?></td>
                            <td>Rp. <?= number_format($daftar_produk->harga, 0, ',', '.'); ?></td>

                            <td width="15%" class="text-center">
                                <button type="button" class="btn btn-primary btn-sm mb-2" data-toggle="modal"
                                    data-target="#detailModal<?= $daftar_produk->id_produk; ?>">
                                    <i class="fas fa-clipboard"></i> Detail
                                </button>
                                <a href="<?= base_url('admin/daftar-produk/edit/' . $daftar_produk->id_produk); ?>"
                                    class="text-white btn btn-warning btn-sm mb-2"><i class="fas fa-edit"></i>
                                    Edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#hapusModal<?= $daftar_produk->id_produk; ?>"><i class=" fas
                                            fa-trash-alt"></i>
                                    Hapus</button>
                            </td>
                            <td>
                                <div class="">
                                    <i class="fas fa-user-pen me-1"></i>
                                    <span class="border border-secondary rounded text-start px-2 ms-2 text-secondary"
                                        style="display:inline-block; width:150px;">
                                        <?= $daftar_produk->username; ?>
                                    </span>
                                </div>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

        <!-- Modal img-->
        <?php foreach ($produk as $daftar_produk): ?>
            <div class="modal fade" id="imageModal<?= $daftar_produk->id_produk; ?>" tabindex="-1" role="dialog"
                aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-body">
                        <img src="<?= base_url('img-asset/produk/' . $daftar_produk->gambar_path); ?>"
                            alt="<?= $daftar_produk->nama_produk; ?>" class="img-fluid">
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- end modal img -->

        <!-- Detail data -->
        <?php foreach ($produk as $daftar_produk): ?>
            <div class="modal fade" id="detailModal<?= $daftar_produk->id_produk; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h1 class="modal-title fs-5" id="tambahModallabel"><i class="fas fa-clipboard"></i> Detail
                                Produk
                            </h1>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <img src="<?= base_url('/img-asset/produk/' . $daftar_produk->gambar_path); ?>"
                                            alt="<?= $daftar_produk->nama_produk; ?>" style="width:300px;">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <h5> <?= $daftar_produk->nama_produk; ?></h5>
                                        </div>
                                        <div class="mb-3">
                                            <h6> <b>Kategori : </b> <?= $daftar_produk->nama_kategori; ?></h6>
                                        </div>
                                        <div class="mb-3">
                                            <h6> <b>Harga : </b>
                                                Rp. <?= number_format($daftar_produk->harga, 0, ',', '.'); ?></h6>
                                        </div>
                                        <div class="mb-3">
                                            <h6 style="white-space: pre-line;"> <b>Bahan: </b>
                                                <?= $daftar_produk->bahan; ?></h6>
                                        </div>
                                        <div class="mb-3">
                                            <h6 style="white-space: pre-line;"> <b>Ukuran : </b>
                                                <?= $daftar_produk->ukuran; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- end Detail data -->
        <!-- modal hapus -->
        <?php foreach ($produk as $daftar_produk): ?>
            <div class="modal fade" id="hapusModal<?= $daftar_produk->id_produk; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">


                        <div class="modal-header bg-danger text-white">
                            <h1 class="modal-title fs-5" id="tambahModallabel"><i class="fas fa-trash-alt"></i>
                                Hapus
                                Produk
                            </h1>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form action="<?= base_url('admin/daftar-produk/hapus/' . $daftar_produk->id_produk); ?>"
                                method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <img src="<?= base_url('img-asset/produk/' . $daftar_produk->gambar_path); ?>"
                                                alt="<?= $daftar_produk->nama_produk; ?>" style="width:300px;">
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <h5> <?= $daftar_produk->nama_produk; ?></h5>
                                            </div>
                                            <div class="mb-3">
                                                <h6> <b>Kategori : </b> <?= $daftar_produk->nama_kategori; ?></h6>
                                            </div>
                                            <div class="mb-3">
                                                <h6> <b>Harga : </b>
                                                    Rp. <?= number_format($daftar_produk->harga, 0, ',', '.'); ?></h6>
                                            </div>
                                            <div class="mb-3">
                                                <h6 style="white-space: pre-line;"> <b>Bahan: </b>
                                                    <?= $daftar_produk->bahan; ?></h6>
                                            </div>
                                            <div class="mb-3">
                                                <h6 style="white-space: pre-line;"> <b>Ukuran : </b>
                                                    <?= $daftar_produk->ukuran; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            Yakin Hapus Data?
                            <button tyoe="submit" class="btn btn-danger">Hapus</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- end modal hapus -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col-lg-12 -->