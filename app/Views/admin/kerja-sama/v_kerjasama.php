<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header bg-success">
                    Tambah Data Distributor
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/distributor/tambah'); ?>" method="post"
                        enctype="multipart/form-data">
                        <?php $errors = session()->getFlashdata('errors'); ?>
                        <?= csrf_field(); ?>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="gambar">Logo Perusahaan</label>
                                <input type="file"
                                    class="form-control-file  <?= isset($errors['gambar']) ? 'is-invalid' : '' ?>"
                                    name="gambar" id="gambar">
                                <?php if (isset($errors['gambar'])): ?>
                                    <div class="invalid-feedback"><?= $errors['gambar']; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="alamat">Alamat</label>
                                <input type="text"
                                    class="form-control  <?= isset($errors['alamat']) ? 'is-invalid' : '' ?>"
                                    name="alamat" id="alamat">
                                <?php if (isset($errors['alamat'])): ?>
                                    <div class="invalid-feedback"><?= $errors['alamat']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="nama">Nama Perusahaan</label>
                                <input type="text"
                                    class="form-control <?= isset($errors['nama']) ? 'is-invalid' : '' ?>" name="nama"
                                    id="nama">
                                <?php if (isset($errors['nama'])): ?>
                                    <div class="invalid-feedback"><?= $errors['nama']; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="telp">No. Telepon</label>
                                <input type="text"
                                    class="form-control <?= isset($errors['telp']) ? 'is-invalid' : '' ?>" name="telp"
                                    id="telp">
                                <?php if (isset($errors['telp'])): ?>
                                    <div class="invalid-feedback"><?= $errors['telp']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
            <div class="flash-data" data-flashdata="<?= session('message'); ?>">
            </div>
            <div class="card">
                <div class="card-header bg-info">
                    Daftar Distributor
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dataTables" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10px;">No</th>
                                <th>Logo Brand</th>
                                <th>Nama Perusahaan</th>
                                <th>Alamat</th>
                                <th>No. Telepon</th>
                                <th>Aksi</th>
                                <th>Editor</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($kerjasama as $data): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td width="15%" class="text-center">
                                        <img src="<?= base_url('img-asset/distributor/'); ?><?= $data->logo_path; ?> "
                                            alt="<?= $data->logo_path; ?>" style="width:100px;">
                                    </td>
                                    <td><?= $data->nama_perusahaan; ?></td>
                                    <td><?= $data->alamat; ?></td>
                                    <td><?= $data->no_telp; ?></td>
                                    <td width="15%" class="text-center">
                                        <button type="button" class="btn btn-warning btn-sm text-white mb-2"
                                            data-toggle="modal" data-target="#editModal<?= $data->id_kerjasama; ?>"><i
                                                class=" fas fa-edit"></i> Edit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm " data-toggle="modal"
                                            data-target="#hapusModal<?= $data->id_kerjasama; ?>"><i class=" fas
                                            fa-trash-alt"></i>
                                            Hapus</button>
                                    </td>
                                    <td width="10%">
                                        <i class="fas fa-user-pen me-2"></i>
                                        <span class="border border-secondary rounded text-start px-2 ms-2 text-secondary"
                                            style="display:inline-block;">
                                            <?= $data->username; ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- modal hapus -->
                <?php foreach ($kerjasama as $data): ?>
                    <div class="modal fade" id="hapusModal<?= $data->id_kerjasama; ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h1 class="modal-title fs-5" id="tambahModallabel"><i class="fas fa-trash-alt"></i>
                                        Hapus Data Distributor
                                    </h1>
                                    <button type="button" class="btn-close" data-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('admin/distributor/hapus/' . $data->id_kerjasama); ?>"
                                        method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <img src="<?= base_url('img-asset/distributor/' . $data->logo_path); ?>"
                                                        alt="<?= $data->logo_path; ?>" style="width:100px; height:100px;"
                                                        class="img-fluid border border-secondary">
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-4">
                                                        <h6><b>Nama Perusahaan:</b></h6>
                                                        <h6><?= $data->nama_perusahaan; ?></h6>
                                                    </div>
                                                    <div class="">
                                                        <h6><b>Alamat:</b></h6>
                                                        <h6><?= $data->alamat; ?></h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="mb-4">
                                                        <h6><b>Nomor Telepon:</b></h6>
                                                        <h6><?= $data->no_telp; ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class=" modal-footer">
                                    Yakin Hapus Data?
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button tyoe="submit" class="btn btn-danger">Hapus</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- end modal hapus -->
                <!-- Modal edit-->
                <?php foreach ($kerjasama as $data): ?>
                    <div class="modal fade" id="editModal<?= $data->id_kerjasama; ?>" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-warning text-white">
                                    <h1 class="modal-title fs-5" id="tambahModallabel"><i class="fas fa-edit"></i>
                                        Edit Dokumentasi
                                    </h1>
                                    <button type="button" class="btn-close" data-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="tambahproduk"
                                        action="<?= base_url('admin/distributor/ubah/' . $data->id_kerjasama); ?>"
                                        method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_method" value="PUT">
                                        <?= csrf_field(); ?>
                                        <div class="form-group row">
                                            <input type="hidden" class="form-control-file" name="old_gambar" id="old_gambar"
                                                value="<?= $data->logo_path; ?>" required>
                                            <label for="gambar" class="col-sm-3 col-form-label">Logo Perusahaan</label>
                                            <div class="col-sm-9">
                                                <img src="<?= base_url('img-asset/distributor/'); ?><?= $data->logo_path; ?>"
                                                    alt="<?= $data->logo_path; ?>" style="width:150px;"
                                                    class="img-fluid border border-secondary mb-2">
                                                <input type="file" class="form-control-file" name="gambar" id="gambar">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama" class="col col-form-label">Nama Perusahaan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nama" id="nama"
                                                    value="<?= $data->nama_perusahaan ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="alamat" id="alamat"
                                                    value="<?= $data->alamat; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="telp" class="col col-form-label">No. Telepon</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="telp" id="telp"
                                                    value="<?= $data->no_telp; ?>" required>
                                            </div>
                                        </div>
                                </div>
                                <div class=" modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-warning text-white">Ubah</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- end modal edit -->
                <!-- /.card-body -->
            </div>
        </div>
    </div>



    <!-- /.card -->
</div>