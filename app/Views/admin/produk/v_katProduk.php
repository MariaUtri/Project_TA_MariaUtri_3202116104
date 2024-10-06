<div class="col-lg-12">
    <div class="card">
        <div class="card-body">

            <div class="card">
                <div class="card-header bg-success">
                    Tambah Kategori Produk
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/kategori-produk/tambah'); ?> " method="post" id="quickForm">
                        <?php $errors = session()->getFlashdata('errors'); ?>
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="nama_kategori" class="col-form-label">Nama Kategori Produk</label>
                            <input type="text"
                                class="form-control <?= isset($errors['nama_kategori']) ? 'is-invalid' : '' ?>"
                                name="nama_kategori" id="nama_kategori">
                            <?php if (isset($errors['nama_kategori'])): ?>
                                <div class="invalid-feedback"><?= $errors['nama_kategori']; ?></div>
                            <?php endif; ?>
                        </div>
                        <button type="submit" id="submitBtn" class="btn btn-success btn-sm"> <i class="fas fa-plus"></i>
                            Tambah</button>

                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title">Daftar Kategori Produk</h3>
                    <div class="flash-data" data-flashdata="<?= session('message'); ?>"></div>
                    <div class="error" data-flashdata="<?= session('error'); ?>"></div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dataTables" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10px;">No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($kategori as $daftar): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $daftar->nama_kategori; ?></td>
                                    <td width="25%" class="text-center">
                                        <button type="button" class="text-white btn btn-warning btn-sm py-1"
                                            data-toggle="modal" data-target="#ubahModal<?= $daftar->id_kat_produk; ?>"><i
                                                class="fas fa-edit"></i>
                                            Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm ms-2 py-1" data-toggle="modal"
                                            data-target="#hapusModal<?= $daftar->id_kat_produk; ?>"><i class=" fas
                                            fa-trash-alt"></i>
                                            Hapus</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

    <!-- edit data -->
    <?php foreach ($kategori as $daftar): ?>
        <div class="modal fade" id="ubahModal<?= $daftar->id_kat_produk; ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-warning text-white">
                        <h1 class="modal-title fs-5" id="tambahModallabel"><i class="fas fa-edit"></i> Ubah
                            Kategori
                            Produk
                        </h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/kategori-produk/ubah/' . $daftar->id_kat_produk); ?>"
                            method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mb-3">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                                    value="<?= $daftar->nama_kategori; ?>" required>

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning btn-sm">Ubah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- end edit data -->

    <!-- modal hapus -->
    <?php foreach ($kategori as $daftar): ?>
        <div class="modal fade" id="hapusModal<?= $daftar->id_kat_produk; ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5" id="tambahModallabel"><i class="fas fa-edit"></i> Hapus
                            Kategori Produk
                        </h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/kategori-produk/hapus/' . $daftar->id_kat_produk); ?>"
                            method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">

                            <p>Yakin hapus Data Kategori Produk : <b><?= $daftar->nama_kategori; ?></b></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-sm">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- end modal hapus -->

    <!-- /.card -->
</div>
<!-- /.col-lg-12 -->