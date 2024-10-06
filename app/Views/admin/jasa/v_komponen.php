<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('admin/daftar-jasa'); ?>" type="button" class="btn">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header bg-success">
                    Tambah Komponen
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/daftar-jasa/komponen/tambah'); ?>" method="post"
                        enctype="multipart/form-data">
                        <?php $errors = session()->getFlashdata('errors'); ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_jasa" id="id_jasa" value="<?= $id_jasa; ?>">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="komponen" class="col-form-label">Gambar Komponen</label>
                                <input type="file"
                                    class="form-control-file <?= isset($errors['komponen']) ? 'is-invalid' : '' ?>"
                                    name="komponen" id="komponen">
                                <?php if (isset($errors['komponen'])): ?>
                                    <div class="invalid-feedback"><?= $errors['komponen']; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama"
                                    class="col-form-label  <?= isset($errors['nama']) ? 'is-invalid' : '' ?>">Nama
                                    Komponen</label>
                                <input type="text" class="form-control" name="nama" id="nama">
                                <?php if (isset($errors['nama'])): ?>
                                    <div class="invalid-feedback"><?= $errors['nama']; ?></div>
                                <?php endif; ?>
                            </div>

                        </div>
                        <button tyoe="submit" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i>
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
            <div class="flash-data" data-flashdata="<?= session('message'); ?>"></div>
            <div class="card">
                <div class="card-header bg-info">
                    Daftar Komponen Sampel Produk
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dataTables" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:10px;">No</th>
                                <th>Gambar</th>
                                <th>Nama Komponen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($komponen as $data): ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td width="20%" class="text-center">
                                        <img src="<?= base_url('img-asset/jasa_komponen/' . $data->gambar_path); ?>"
                                            alt="<?= $data->nama_komponen; ?>"
                                            style="width:100px; height:100px; cursor: pointer;"
                                            class="border border-secondary" data-toggle="modal"
                                            data-target="#imageModal<?= $data->id_komponen; ?>">

                                    </td>
                                    <td class=""><?= $data->nama_komponen ?></td>
                                    <td width="20%" class="text-center">
                                        <button class="text-white btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#editModal<?= $data->id_komponen; ?>"><i class="fas fa-edit"></i>
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm " data-toggle="modal"
                                            data-target="#hapusModal<?= $data->id_komponen; ?>"><i class=" fas
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
    <!-- Modal img-->
    <?php foreach ($komponen as $data): ?>
        <div class="modal fade" id="imageModal<?= $data->id_komponen; ?>" tabindex="-1" role="dialog"
            aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <img src="<?= base_url('img-asset/jasa_komponen/' . $data->gambar_path); ?>" alt="Preview Img"
                    class="img-fluid border border-secondary">
            </div>
        </div>
    <?php endforeach; ?>
    <!-- end modal img -->

    <!-- Edit Modal -->
    <?php foreach ($komponen as $data): ?>
        <div class="modal fade" id="editModal<?= $data->id_komponen; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5" id="tambahModallabel"><i class="fas fa-edit"></i>
                            Edit Komponen
                        </h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="<?= base_url('admin/daftar-jasa/komponen/ubah/' . $data->id_komponen); ?>"
                            method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label for="komponen" class="col-sm-4 col-form-label">Gambar Komponen</label>
                                <div class="col-sm-8">
                                    <input type="hidden" class="form-control" name="old_komponen" id="old_komponen"
                                        value="<?= $data->gambar_path; ?>">
                                    <img src="<?= base_url('img-asset/jasa_komponen/' . $data->gambar_path); ?>"
                                        alt="<?= $data->nama_komponen; ?>" style="width:100px; height:100px;"
                                        class="mb-2 img-fluid border border-secondary">
                                    <input type="file" class="form-control-file " name="komponen" id="komponen">
                                </div>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" name="id_jasa" id="id_jasa" value="<?= $id_jasa; ?>">
                                <label for="nama" class="col-sm-4 col-form-label">Nama Komponen</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        value="<?= $data->nama_komponen; ?>" required>
                                </div>
                            </div>

                    </div>
                    <div class=" modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- End Edit Modal -->

    <!-- modal hapus -->
    <?php foreach ($komponen as $data): ?>
        <div class="modal fade" id="hapusModal<?= $data->id_komponen; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5" id="tambahModallabel"><i class="fas fa-trash-alt"></i>
                            Hapus Komponen
                        </h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="<?= base_url('admin/daftar-jasa/komponen/hapus/' . $data->id_komponen) ?>"
                            method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <h6><b><?= $data->nama_komponen; ?></b></h6>
                                        <img src="<?= base_url('img-asset/jasa_komponen/' . $data->gambar_path); ?>"
                                            alt="<?= $data->nama_komponen; ?>" style="width:100px; height:100px;"
                                            class="mb-2 border border-secondary">
                                    </div>
                                    <div class="col-lg-7 d-flex d-column align-items-center">
                                        <div class="mb-4 mx-auto">
                                            <h6><b>Yakin Hapus Komponen Produk?</b></h6>

                                        </div>
                                    </div>
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
</div>