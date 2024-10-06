<section class="services-tagline">
    <div class="container-fluid">
        <div>
            <h3><?= $d_detail->nama_jasa; ?></h>
        </div>
    </div>
</section>

<section class="detail-jasa">
    <div class="container pt-3">
        <?php if ($detail): ?>
            <div class="position-relative title d-flex justify-content-start align-items-center py-2 mb-3">
                <div class="line-left me-3">
                    <hr class="opacity-0">
                </div>
                <h3>Sampel Produk</h3>
            </div>
            <div class="row mb-2">
                <?php foreach ($detail as $details): ?>
                    <div class="col-md-3 mb-4 d-flex justify-content-center">
                        <div>
                            <img src="<?= base_url('img-asset/jasa_sampel/') . $details->gambar_path; ?>"
                                alt="<?= $details->gambar_path; ?>" class="img-fluid hover-shadow pe-auto"
                                data-bs-toggle="modal" data-bs-target="#sampelProduk<?= $details->id_gambar_jasa; ?>"
                                style="cursor:pointer">
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php else: ?>
            <div class="d-flex justify-content-center">
                <h5>Sampel Produk belum ada</h5>
            </div>
        <?php endif ?>
        <div class="row mb-2">
            <?php if ($komponen): ?>
                <div class=" position-relative title d-flex justify-content-start align-items-center pt-4">
                    <div class="line-left me-3">
                        <hr class="opacity-0">
                    </div>
                    <h3>Komponen</h3>
                </div>
                <div class="row komponen mb-2 py-3">
                    <?php $no = 1; ?>
                    <?php foreach ($komponen as $data): ?>
                        <div class="col-md-3 mb-4 d-flex justify-content-center">
                            <img src="<?= base_url('img-asset/jasa_komponen/') . $data->gambar_path; ?>"
                                alt="<?= $data->nama_komponen; ?>" class="img-fluid hover-shadow cursor" data-bs-toggle="modal"
                                data-bs-target="#sampelKomponen<?= $data->id_komponen; ?>" style="cursor:pointer">
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Modal sampel-->
    <?php foreach ($komponen as $data): ?>
        <div class="modal fade" id="sampelKomponen<?= $data->id_komponen; ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-transparent border-0">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="<?= base_url('img-asset/jasa_komponen/') . $data->gambar_path; ?>"
                            alt="<?= $data->gambar_path; ?>" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- end modal sampel -->

    <!-- Modal sampel-->
    <?php foreach ($detail as $details): ?>
        <div class="modal fade" id="sampelProduk<?= $details->id_gambar_jasa; ?>" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-transparent border-0">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="<?= base_url('img-asset/jasa_sampel/') . $details->gambar_path; ?>"
                            alt="<?= $details->gambar_path; ?>" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- end modal sampel -->

</section>


<section class="services-section">
    <div class="py-3 d-flex justify-content-center">
        <h3>Jasa lain</h3>
    </div>
    <div class="container py-3">
        <div class="row">
            <?php foreach ($more as $data): ?>
                <?php if ($data->id_jasa !== $id_jasa): ?>
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
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>