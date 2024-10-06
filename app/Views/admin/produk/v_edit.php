<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <h3 class="card-title">Edit Produk</h3>
                </div>
            </div>


        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form id="editproduk" action="<?= base_url('admin/daftar-produk/ubah/' . $produk->id_produk); ?>"
                method="post" enctype="multipart/form-data">
                <?php $errors = session()->getFlashdata('errors'); ?>
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group row">
                    <input type="hidden" class="form-control-file" name="old_gambar" id="old_gambar"
                        value="<?= $produk->gambar_path; ?>">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar Produk</label>
                    <div class="col-sm-10">
                        <img src="<?= base_url('img-asset/produk/'); ?><?= $produk->gambar_path; ?>"
                            alt="<?= $produk->gambar_path; ?>" style="width:150px; height:150px;"
                            class="mb-2 border border-secondary">

                        <input type="file" class="form-control-file <?= isset($errors['gambar']) ? 'is-invalid' : '' ?>"
                            name="gambar" id="gambar">
                        <?php if (isset($errors['gambar'])): ?>
                            <div class="invalid-feedback"><?= $errors['gambar']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= isset($errors['nama_produk']) ? 'is-invalid' : '' ?>"
                            name="nama_produk" id="nama_produk" placeholder="cth: Meja Makan 2 set"
                            value="<?= old('nama_produk', $produk->nama_produk); ?>">
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
                                <option value="<?= $data->id_kat_produk; ?>"
                                    <?= ($data->id_kat_produk == $produk->id_kat_produk) ? 'selected' : ''; ?>>
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
                    <label for="harga" class="col col-form-label" required>Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control  <?= isset($errors['harga']) ? 'is-invalid' : '' ?>"
                            name="harga" id="harga" value="<?= old('harga', $produk->harga); ?>"
                            placeholder="cth : 100000">
                        <?php if (isset($errors['harga'])): ?>
                            <div class="invalid-feedback"><?= $errors['harga']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bahan" class="col col-form-label">Bahan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control auto-height <?= isset($errors['bahan']) ? 'is-invalid' : '' ?>"
                            name="bahan" id="bahan" rows="5" rows="1"
                            placeholder="cth : - Kayu"><?= old('bahan', $produk->bahan); ?></textarea>
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
                            placeholder="cth : 20x20x20 (Dalam cm)"><?= $produk->ukuran; ?></textarea>
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