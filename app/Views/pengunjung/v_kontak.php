<section class="contact-tagline">
    <div class="container d-flex justify-content-center align-items-center">
        <div>
            <h1 class="display-4"><?= $judul; ?></h1>
            <p class="lead"><?= $tagline; ?></p>
        </div>
    </div>
</section>

<section class="section-contact">
    <div class="container py-5">
        <div class="contact-header">
            <h3 class="py-3">Kontak Info</h3>
        </div>
        <div class="row mt-3">
            <div class="col-md-3 mb-2">
                <div class="card">

                    <div class="card-body">
                        <div class="top">
                            <div class="text-center">
                                <i class=" fas fa-map-location-dot fs-1 bg-second py-2"></i>
                                <h5 class="text-center">Kantor</h5>
                                <p>
                                    <?= $kontak[0]->alamat; ?>
                                </p>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3  mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="top">
                            <div class="text-center">
                                <i class="fas fa-tty fs-1 bg-second py-2"></i>
                                <h5>Hubungi Kami</h5>
                                <p>
                                    <i class="fas fa-phone me-1"></i> <?= $kontak[0]->no_telp; ?>
                                    <br>
                                    <i class="fas fa-envelope me-2"></i><?= $kontak[0]->email; ?>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3  mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="top">
                            <div class="text-center">
                                <i class="fas fa-thumbtack fs-1 bg-second py-2"></i>
                                <h5>Sosial Media</h5>
                                <?php foreach ($sosmed as $data): ?>
                                    <a href="<?= $data->link_sosmed ?>" class="mx-1">
                                        <?php if (strpos($data->link_sosmed, 'instagram.com') !== false): ?>
                                            <i class="primary-color fa-brands fa-square-instagram fs-3 color-bg"></i>
                                        <?php endif; ?>
                                        <?php if (strpos($data->link_sosmed, 'facebook.com') !== false): ?>
                                            <i class="primary-color fa-brands fa-square-facebook fs-3"></i>
                                        <?php endif; ?>
                                        <?php if (strpos($data->link_sosmed, 'linkedin.com') !== false): ?>
                                            <i class="primary-color fa-brands fa-square-facebook fs-3"></i>
                                        <?php endif; ?>
                                        <?php if (strpos($data->link_sosmed, 'linkedin.com') !== false): ?>
                                            <i class="primary-color fa-brands fa-square-facebook fs-3"></i>
                                        <?php endif; ?>
                                        <?php if (strpos($data->link_sosmed, 'x.com') !== false): ?>
                                            <i class="primary-color fa-brands fa-square-x-twitter fs-3"></i>
                                        <?php endif; ?>
                                        <?php if (strpos($data->link_sosmed, 'tiktok.com') !== false): ?>
                                            <i class="primary-color fa-brands fa-tiktok fs-3"></i>
                                        <?php endif; ?>
                                    </a>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= ($kontak[0]->maps); ?>
        </div>
    </div>
</section>