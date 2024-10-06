<section class="services-tagline">
    <div class="container-fluid">
        <div>
            <h3><?= $judul; ?></h3>
            <p><?= $tagline; ?></p>
        </div>
    </div>
</section>

<section class="services-section">
    <div class="container py-5">
        <div class="row">
            <?php foreach ($jasa as $data): ?>
                <div class="col-md-4 mb-4">
                    <div class="position-relative">
                        <?php if (!empty($data->gambar_path)): ?>
                            <img src="<?= base_url('img-asset/jasa_sampel/') . $data->gambar_path; ?>" alt="Sampel Produk"
                                class="img-fluid">
                        <?php else: ?>
                            <div class="blank-img d-flex justify-content-center align-items-center">
                                <i class="fas fa-image"></i>
                            </div>
                        <?php endif; ?>
                        <div class="md-mode">
                            <h3><?= $data->nama_jasa; ?></h3>
                            <a href="<?= base_url('/jasa/' . $data->id_jasa); ?>" class="btn px-2 py-1 mt-2">Lihat
                                Selengkapnya</a>
                        </div>
                        <div class="overlay position-absolute d-flex justify-content-center align-items-center">
                            <div>
                                <h3 class="poppins"><?= $data->nama_jasa; ?></h3>
                                <a href="<?= base_url('/jasa/' . $data->id_jasa); ?>" class="btn btn-sm px-3 mt-3">Lihat
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>