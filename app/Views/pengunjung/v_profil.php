<!-- tagline -->
<section class="profile-tagline">
    <div class="container-fluid">
        <div>
            <h3><?= $judul; ?></h3>
            <p><?= $tagline; ?></p>
        </div>
    </div>
</section>

<section class="history-section py-4">
    <div class="container">
        <div class="history-header d-flex justify-content-center">
            <h3 class="py-4">Tentang Kami</h3>
        </div>
        <div class="row py-5">
            <div class="col-md-6">
                <div class="image-container d-flex justify-content-center align-items-center">
                    <img src="<?= base_url('asset-pengunjung'); ?>/img/aboutdesk.jpg"
                        alt="Keluarga Besar CV. Berkah Pintu Kreasi" class="img-fluid mb-3 ms-4">
                </div>
            </div>
            <div class="col-md-6">
                <div class="history-content">
                    <h3>Sejarah</h3>
                    <p class="" style="white-space: pre-line;">
                        <?= $data[0]->sejarah; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="bg-secondary-subtle py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12 px-3">
                <div class="container border border-1 rounded-circle bg-logo d-flex justify-content-center align-items-center"
                    style="height: 70px; width: 70px;">
                    <i class="fas fa-globe text-white text-center fs-1" width="250%"></i>
                </div>

                <hr>
                <h3 class="card-title text-center">Visi</h3>
                <p class="card-text py-3 px-3 text-center poppins-light fs-5" style="white-space: pre-line;">
                    <?= $data[0]->visi; ?>
                </p>

            </div>
            <div class="col-md-6 col-sm-12 px-3">
                <div class="container border border-1 rounded-circle bg-logo d-flex justify-content-center align-items-center"
                    style="height: 70px; width: 70px;">
                    <i class="fas fa-compass text-white text-center fs-1" width="250%"></i>
                </div>
                <hr>
                <h3 class="card-title text-center">Misi</h3>
                <p class="poppins-light py-3 fs-5" style="white-space: pre-line;">
                    <?= $data[0]->misi; ?>
                </p>
            </div>
        </div>

    </div>
</section>