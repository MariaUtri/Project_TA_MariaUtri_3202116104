<div class="col-lg-12">
    <div class="card">
        <div class="card-header  bg-success">
            <h3 class="card-title">Tambah Produk</h3>
        </div>


        <!-- /.card-header -->
        <div class="card-body">
            <form id="tambahproduk" action="<?= base_url('admin/daftar-produk/tambah'); ?>" method="post"
                enctype="multipart/form-data">
                <?php $errors = session()->getFlashdata('errors'); ?>
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar
                        Produk</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <input type="file"
                                class="form-file-input <?= isset($errors['gambar']) ? 'is-invalid' : '' ?>"
                                name="gambar" id="gambar">
                            <?php if (isset($errors['gambar'])): ?>
                                <div class="invalid-feedback"><?= $errors['gambar']; ?></div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama
                        Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['nama_produk']) ? 'is-invalid' : '' ?>"
                            name="nama_produk" id="nama_produk" placeholder="cth: Meja Makan 2 set"
                            value="<?= old('nama_produk'); ?>">
                        <?php if (isset($errors['nama_produk'])): ?>
                            <div class="invalid-feedback"><?= $errors['nama_produk']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kategori_produk" class="col-sm-2 col-form-label">Kategori
                        Produk</label>
                    <div class="col-sm-10">
                        <select class="custom-select <?= isset($errors['kategori_produk']) ? 'is-invalid' : '' ?>"
                            aria-label="Default select example" name="kategori_produk" id="kategori_produk">
                            <option value="" hidden>Pilih Kategori</option>
                            <?php foreach ($kategori as $data): ?>
                                <option value="<?= $data->id_kat_produk; ?>" <?= old('kategori_produk') == $data->id_kat_produk ? 'selected' : ''; ?>>
                                    <?= $data->nama_kategori; ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <?php if (isset($errors['kategori_produk'])): ?>
                            <div class="invalid-feedback"><?= $errors['kategori_produk']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control  <?= isset($errors['harga']) ? 'is-invalid' : '' ?>"
                            name="harga" id="harga" placeholder="cth : 100000" value="<?= old('harga'); ?>">
                        <?php if (isset($errors['harga'])): ?>
                            <div class="invalid-feedback"><?= $errors['harga']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bahan" class="col col-form-label">Bahan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control auto-height <?= isset($errors['bahan']) ? 'is-invalid' : '' ?>"
                            name="bahan" id="bahan" rows="1" placeholder="cth : - Kayu"><?= old('bahan'); ?></textarea>
                        <?php if (isset($errors['bahan'])): ?>
                            <div class="invalid-feedback"><?= $errors['bahan']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ukuran" class="col col-form-label">Ukuran</label>
                    <div class="col-sm-10">
                        <textarea class="form-control auto-height <?= isset($errors['ukuran']) ? 'is-invalid' : '' ?>"
                            name="ukuran" id="ukuran" rows="1"
                            placeholder="cth : 20x20x20 (Dalam cm)"><?= old('ukuran'); ?></textarea>
                        <?php if (isset($errors['ukuran'])): ?>
                            <div class="invalid-feedback"><?= $errors['ukuran']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="<?= base_url('admin/daftar-produk'); ?>" class="btn btn-danger ms-2 px-4">Batal</a>
                    </div>
                </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col-lg-12 -->