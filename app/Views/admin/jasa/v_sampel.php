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
                    Tambah Sampel Produk
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/daftar-jasa/sampel/tambah'); ?>" method="post"
                        enctype="multipart/form-data">
                        <?php $errors = session()->getFlashdata('errors'); ?>
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id_jasa" id="id_jasa" value="<?= $id_jasa; ?>">
                        <div class="form-group row">
                            <label for="sampel" class="col-md-2">Sampel Produk</label>
                            <div class="col-md-10">
                                <input type="file"
                                    class="form-control-file <?= isset($errors['sampel[]']) ? 'is-invalid' : '' ?>"
                                    name="sampel[]" id="sampel" multiple>
                                <?php if (isset($errors['sampel[]'])): ?>
                                    <div class="invalid-feedback"><?= $errors['sampel[]']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-plus me-2"></i>
                            Tambah</button>
                    </form>
                </div>
            </div>
            <div class="flash-data" data-flashdata="<?= session('message'); ?>">
                <div class="card">
                    <div class="card-header bg-info">
                        Daftar Sampel Produk
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-center">
                        <?php if (empty($sampel)) { ?>
                            <p><i>Belum ada Sampel Produk...</i></p>
                        <?php } else { ?>
                            <div class="d-flex flex-start flex-wrap">
                                <?php foreach ($sampel as $gambar): ?>
                                    <div class="card" style="width: 240px; margin-right:20px; margin-bottom:25px">
                                        <div class="card-body text-center">
                                            <img src="<?= base_url('img-asset/jasa_sampel/'); ?><?= $gambar->gambar_path; ?>"
                                                alt="<?= $gambar->gambar_path; ?>"
                                                class="img-fluid border border-secondary mb-2"
                                                style="width:200px; height:200px; cursor:pointer;" data-toggle="modal"
                                                data-target="#imageModal<?= $gambar->id_gambar_jasa; ?>">
                                            <div class="text-center">
                                                <button type="button" class="btn btn-danger btn-sm mt-1" data-toggle="modal"
                                                    data-target="#hapusModal<?= $gambar->id_gambar_jasa; ?>"><i class=" fas
                                            fa-trash-alt"></i>
                                                    Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php } ?>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- Modal img-->
        <?php foreach ($sampel as $gambar): ?>
            <div class="modal fade" id="imageModal<?= $gambar->id_gambar_jasa; ?>" tabindex="-1" role="dialog"
                aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered d-flex justify-content-center align-item-center"
                    role="document">
                    <img src="<?= base_url('img-asset/jasa_sampel/' . $gambar->gambar_path); ?>" alt="Gambar Preview"
                        class="img-fluid">
                </div>
            </div>
        <?php endforeach; ?>
        <!-- end modal img -->
        <!-- modal hapus -->
        <?php foreach ($sampel as $gambar): ?>
            <div class="modal fade" id="hapusModal<?= $gambar->id_gambar_jasa; ?>" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h1 class="modal-title fs-5" id="tambahModallabel"><i class="fas fa-trash-alt"></i>
                                Hapus Sampel Produk
                            </h1>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form action="<?= base_url('admin/daftar-jasa/sampel/hapus/' . $gambar->id_gambar_jasa); ?>"
                                method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <img src="<?= base_url('img-asset/jasa_sampel/'); ?><?= $gambar->gambar_path; ?>"
                                                alt="<?= $gambar->gambar_path; ?>" style="width:100px;">
                                        </div>
                                        <div class="col-lg-9 d-flex align-item-center">
                                            <div class="mb-4 mx-auto">
                                                <h6><b>Yakin Hapus Sampel Produk?</b></h6>
                                                <h6></h6>
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