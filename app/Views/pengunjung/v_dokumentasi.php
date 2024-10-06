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
<section class="dokumentasi-section">
    <div class="container mt-4 py-5">
        <div class="row d-flex justify-content-center">
            <?php $no = 1; ?>
            <?php foreach ($dokumentasi as $data): ?>
                <div class="col-md-3 mb-4 d-flex justify-content-center">
                    <div class="card-img" onclick="openModal();currentSlide(<?= $no++ ?>)">
                        <div class="position-relative">
                            <img src="<?= base_url('img-asset/galeri/'); ?><?= $data->gambar_path ?>" class="img-fluid"
                                alt="<?= $data->deskripsi; ?>">
                            <div class="overlay position-absolute d-flex justify-content-center align-items-center px-2">
                                <button><i class="zoom fa-solid fa-magnifying-glass-plus"></i></button>
                            </div>
                        </div>
                        <div class="caption-section py-3 px-3">
                            <h5 class="poppins"><?= $data->deskripsi; ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="myModal" class="lightbox-modal">
        <span class="close cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content px-2">
            <?php foreach ($dokumentasi as $data): ?>
                <div class="mySlides">
                    <img src="<?= base_url('img-asset/galeri/'); ?><?= $data->gambar_path ?>"
                        alt="<?= $data->deskripsi; ?>">
                </div>
            <?php endforeach; ?>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>
</section>