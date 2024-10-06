<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header bg-success">
                    Tambah Jasa
                </div>
                <div class="card-body">
                    <form id="tambahproduk" action="<?= base_url('admin/daftar-jasa/tambah'); ?>" method="post"
                        enctype="multipart/form-data">
                        <?php $errors = session()->getFlashdata('errors'); ?>
                        <?= csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama_jasa">Nama Jasa</label>
                                <input type="text"
                                    class="form-control <?= isset($errors['nama_jasa']) ? 'is-invalid' : '' ?>"
                                    name="nama_jasa" id="nama_jasa" value="<?= old('nama_jasa'); ?>">
                                <?php if (isset($errors['nama_jasa'])): ?>
                                    <div class="invalid-feedback"><?= $errors['nama_jasa']; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="distributor">Distributor</label>
                                <select class="custom-select <?= isset($errors['distributor']) ? 'is-invalid' : '' ?>"
                                    aria-label="Default select example" name="distributor" id="distributor">
                                    <option value="" hidden>Pilih Distributor</option>
                                    <?php foreach ($distributor as $data): ?>
                                        <option value="<?= $data->id_kerjasama; ?>">
                                            <?= $data->nama_perusahaan; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (isset($errors['distributor'])): ?>
                                    <div class="invalid-feedback"><?= $errors['distributor']; ?></div>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-plus"></i>
                                Tambah</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="flash-data" data-flashdata="<?= session('message'); ?>">
            </div>
            <div class="card">
                <div class="card-header bg-info">
                    Daftar Jasa
                </div>
                <div class="card-body">
                    <table id="dataTables" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10px;">No</th>
                                <th>Nama Jasa</th>
                                <th>Distributor</th>
                                <th>Sampel Produk</th>
                                <th>Komponen</th>
                                <th>Aksi</th>
                                <th>Editor</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($jasa as $data): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data->nama_jasa; ?></td>
                                    <td><?= $data->nama_perusahaan; ?></td>
                                    <td width="14%" class="text-center">
                                        <?php
                                        $id_jasa = $data->id_jasa;
                                        $sampelStatus = isset($gambarJasaStatus[$id_jasa]) ? $gambarJasaStatus[$id_jasa] : 0;
                                        $komponen = isset($komponenJasa[$id_jasa]) ? $komponenJasa[$id_jasa] : null;
                                        ?>
                                        <?php if ($sampelStatus): ?>
                                            <a class="btn btn-primary btn-sm px-3"
                                                href="<?= base_url('admin/daftar-jasa/sampel/' . $id_jasa); ?>">
                                                <i class="fas fa-clipboard me-1"></i> Lihat
                                            </a>
                                        <?php else: ?>
                                            <a class="btn btn-success btn-sm"
                                                href="<?= base_url('admin/daftar-jasa/sampel/' . $id_jasa); ?>">
                                                <i class="fas fa-plus"></i> Tambah
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td width="10%" class="text-center">
                                        <?php if ($komponen && $komponen->id_jasa == $id_jasa): ?>
                                            <a class="btn btn-primary btn-sm px-3"
                                                href="<?= base_url('admin/daftar-jasa/komponen/' . $id_jasa); ?>">
                                                <i class="fas fa-clipboard me-1"></i> Lihat
                                            </a>
                                        <?php else: ?>
                                            <a class="btn btn-success btn-sm"
                                                href="<?= base_url('admin/daftar-jasa/komponen/' . $id_jasa); ?>">
                                                <i class="fas fa-plus"></i> Tambah
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td width="15%" class="text-center">
                                        <button class="text-white btn btn-warning btn-sm mb-2" data-toggle="modal"
                                            data-target="#editModal<?= $data->id_jasa; ?>"><i class="fas fa-edit"></i>
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm mb-2" data-toggle="modal"
                                            data-target="#hapusModal<?= $data->id_jasa; ?>"><i class=" fas
                                            fa-trash-alt"></i>
                                            Hapus</button>
                                    </td>
                                    <td width="20%">
                                        <i class="fas fa-user-pen me-2"></i>
                                        <span class="border border-secondary rounded text-start px-2 ms-2 text-secondary"
                                            style="display:inline-block; width:200px;">
                                            <?= $data->username; ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.card-header -->
    </div>
    <!-- Modal Edit -->
    <?php foreach ($jasa as $data): ?>
        <div class="modal fade" id="editModal<?= $data->id_jasa; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5" id="tambahModallabel"><i class="fas fa-edit"></i>
                            Edit Komponen
                        </h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="<?= base_url('admin/daftar-jasa/ubah/' . $data->id_jasa); ?>" method="post"
                            enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama Jasa</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="<?= $data->nama_jasa; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="distributor" class="col-sm-4 col-form-label">Distributor</label>
                                <div class="col-sm-8">
                                    <select class="form-select" aria-label="Default select example" name="distributor"
                                        id="distributor" required>
                                        <option selected>Pilih Distributor</option>
                                        <?php foreach ($distributor as $d): ?>
                                            <option value="<?= $d->id_kerjasama; ?>" <?= ($d->id_kerjasama == $data->id_kerjasama) ? 'selected' : ''; ?>>
                                                <?= $d->nama_perusahaan; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="komponen" class="col-sm-4 col-form-label">Sampel Produk</label>
                                <div class="col-sm-8">
                                    <a href="<?= base_url('admin/daftar-jasa/sampel/' . $data->id_jasa); ?>"
                                        class="btn btn-warning text-white"> <i class="fas fa-edit"></i> Edit</a>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="komponen" class="col-sm-4 col-form-label">Komponen</label>
                                <div class="col-sm-8">
                                    <a href="<?= base_url('admin/daftar-jasa/komponen/' . $data->id_jasa); ?>"
                                        class="btn btn-warning text-white"> <i class="fas fa-edit"></i> Edit</a>

                                </div>
                            </div>
                    </div>
                    <div class=" modal-footer">
                        <button tyoe="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- End Modal Edit -->

    <!-- modal hapus -->
    <?php foreach ($jasa as $data): ?>
        <div class="modal fade" id="hapusModal<?= $data->id_jasa; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5" id="tambahModallabel"><i class="fas fa-trash-alt"></i>
                            Hapus Data Jasa
                        </h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="<?= base_url('admin/daftar-jasa/hapus/' . $data->id_jasa); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="container-fluid">
                                <div class="row">
                                    <p>Anda yakin menghapus data : <strong> <?= $data->nama_jasa; ?></strong> ?</p>
                                    <small> Semua data Sampel dan Komponen Produk juga akan terhapus!</small>
                                </div>
                            </div>
                    </div>
                    <div class=" modal-footer">
                        <button tyoe="submit" class="btn btn-danger">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- end modal hapus -->
    <!-- /.card -->
</div>