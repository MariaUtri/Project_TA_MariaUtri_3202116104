<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header bg-success">
                    Tambah Dokumentasi
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/dokumentasi/tambah'); ?>" method="post"
                        enctype="multipart/form-data">
                        <?php $errors = session()->getFlashdata('errors'); ?>
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label for="gambar" class="col-sm-2 col-form-label">Gambar
                                Produk</label>
                            <div class="col-sm-10">
                                <input type="file"
                                    class="form-control-file <?= isset($errors['gambar']) ? 'is-invalid' : '' ?>"
                                    name="gambar" id="gambar">
                                <?php if (isset($errors['gambar'])): ?>
                                    <div class="invalid-feedback"><?= $errors['gambar']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea
                                    class="form-control auto-height  <?= isset($errors['deskripsi']) ? 'is-invalid' : '' ?>"
                                    name="deskripsi" id="deskripsi" rows="1"
                                    placeholder="Masukan Deskripsi "></textarea>
                                <?php if (isset($errors['deskripsi'])): ?>
                                    <div class="invalid-feedback"><?= $errors['deskripsi']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flash-data" data-flashdata="<?= session('message'); ?>"></div>
            <div class="card">
                <div class="card-header bg-info">
                    Daftar Dokumentasi
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dataTables" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10px;">No</th>
                                <th>Gambar</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                                <th>Editor</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($dokumentasi as $data): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td width="10%">
                                        <img src="<?= base_url('img-asset/galeri/'); ?><?= $data->gambar_path; ?> "
                                            alt="<?= $data->gambar_path; ?>"
                                            style="width:100px; height:100px; cursor:pointer;"
                                            class="border border-secondary" data-toggle="modal"
                                            data-target="#imageModal<?= $data->id_galeri; ?>">
                                    </td>
                                    <td><?= $data->deskripsi; ?></td>
                                    <td width="15%" class="text-center">
                                        <button class="text-white btn btn-warning btn-sm mb-2" data-toggle="modal"
                                            data-target="#editModal<?= $data->id_galeri; ?>">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm " data-toggle="modal"
                                            data-target="#hapusModal<?= $data->id_galeri; ?>"><i class=" fas
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
    </div>
    <!-- Modal img-->
    <?php foreach ($dokumentasi as $data): ?>
        <div class="modal fade" id="imageModal<?= $data->id_galeri; ?>" tabindex="-1" role="dialog"
            aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center align-items-center modal-lg"
                role="document">
                <img src="<?= base_url('img-asset/galeri/' . $data->gambar_path); ?>" alt="Preview Image "
                    class="img-fluid">
            </div>
        </div>
    <?php endforeach; ?>
    <!-- end modal img-->

    <!-- Modal edit-->
    <?php foreach ($dokumentasi as $data): ?>
        <div class="modal fade" id="editModal<?= $data->id_galeri; ?>" tabindex="-1" role="dialog"
            aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-warning text-white">
                        <h1 class="modal-title fs-5" id="tambahModallabel"><i class="fas fa-edit"></i>
                            Edit Dokumentasi
                        </h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('admin/dokumentasi/ubah/' . $data->id_galeri); ?>" method="post"
                            enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <input type="hidden" class="form-control-file" name="old_gambar" id="old_gambar"
                                    value="<?= $data->gambar_path; ?>">
                                <label for="gambar" class="col-sm-2 col-form-label">Gambar
                                    Produk</label>
                                <div class="col-sm-10">
                                    <img src="<?= base_url('img-asset/galeri/'); ?><?= $data->gambar_path; ?>"
                                        alt="<?= $data->gambar_path; ?>" style="width:150px; height:150px"
                                        class="img-fluid border border-secondary">
                                    <input type="file" class="form-control-file mt-2" name="gambar" id="gambar">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control auto-height" name="deskripsi" id="editDeskripsi" rows="1"
                                        placeholder="..." required><?= $data->deskripsi; ?></textarea>
                                </div>
                            </div>

                    </div>
                    <div class=" modal-footer">
                        <button type="submit" class="btn btn-warning">Ubah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- end modal edit -->

    <!-- modal hapus -->
    <?php foreach ($dokumentasi as $data): ?>
        <div class="modal fade" id="hapusModal<?= $data->id_galeri; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">


                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5" id="tambahModallabel"><i class="fas fa-trash-alt"></i>
                            Hapus
                            Dokumentasi
                        </h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="<?= base_url('admin/dokumentasi/hapus/' . $data->id_galeri); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <img src="<?= base_url('Galeri/' . $data->gambar_path); ?>"
                                            alt="<?= $data->gambar_path; ?>" style="width:300px; height:300px;">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <p style="white-space: pre-line;"> <?= $data->deskripsi; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class=" modal-footer">
                        Yakin Hapus Data?
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