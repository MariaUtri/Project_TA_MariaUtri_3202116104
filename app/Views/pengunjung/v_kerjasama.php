<!-- Hero-section -->

<!-- Hero-section -->
<section class="dokumentasi-tagline">
    <div class="container-fluid">
        <div>
            <h3><?= $judul; ?></h3>
            <p><?= $tagline; ?></p>
        </div>
    </div>
</section>

<!-- content -->
<section class="kerjasama-section">
    <div class="container py-5">
        <div class="row d-flex justify-content-center py-5 px-2">
            <?php foreach ($distributor as $data): ?>
                <div class="col-md-3 d-flex flex-column justify-content-center mb-4">

                    <img src="<?= base_url('img-asset/distributor/'); ?><?= $data->logo_path; ?>"
                        alt="Logo <?= $data->nama_perusahaan; ?>" class="img-fluid object-fit-contain">
                    <h5 class="text-center py-3"><i><?= $data->nama_perusahaan; ?></i></h5>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>