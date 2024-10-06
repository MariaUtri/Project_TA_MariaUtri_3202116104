<!-- Section 2: About the Company -->
<section class="about-section py-5 mb-3">
    <div class="about-header d-flex justify-content-center align-items-center py-3">
        <h5 class="title my-3 py-3 text-center">Tentang Kami</h5>
    </div>
    <div class="about-content position-relative">
        <div class="container-about d-flex d-column align-items-center px-5">
            <div>
                <h3>OUR STORY</h3>
                <p class="poppins text-white"><?= $profil[0]->sejarah; ?></p>
                <a href="<?= base_url('/tentang-kami'); ?>" class="btn">
                    Selengkapnya <i class="fas fa-angles-right"></i>
                </a>

            </div>
        </div>
    </div>
</section>
<!-- end tentang -->

<!-- section produk -->
<!-- Swiper -->
<section class="product-section px-3 pb-3 mb-3 ">
    <div class="container">
        <div class=" d-flex justify-content-center">
            <h5 class="product-header text-center py-3 my-3">Produk Terbaru</h5>
        </div>
        <div class="swiper card_swiper py-4 px-2 pb-4">
            <div class="swiper-wrapper py-4">
                <?php foreach ($produk as $data): ?>
                    <div class="swiper-slide">
                        <div class="card-product border">
                            <div class="card-img position-relative">
                                <img src="<?= base_url('img-asset/produk/') . $data->gambar_path; ?>"
                                    alt="<?= $data->nama_produk; ?>">
                                <div class="detail-product position-absolute">
                                    <button class="btn">
                                        <a href="<?= base_url('/produk/') . $data->id_produk; ?>">Detail</a>
                                    </button>
                                </div>
                            </div>
                            <div class="card-content text-center pt-4">
                                <h5><?= $data->nama_produk; ?></h5>
                                <p class="card-price">Rp. <?= number_format($data->harga, 0, ',', '.'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <div class="swiper-button-next rounded-circle"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="d-flex justify-content-center link-product">
            <a href="<?= base_url('/produk'); ?>" class="p-2 px-3 pt-2">Lihat Selengkapnya</a>
        </div>
    </div>

    <!-- Modal Structure  Product-->
    <div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row p-3">
                        <div class="col-md-6 d-flex justify-content-center align-items-center mb-4">
                            <img id="productImage" src="" alt="Product Image" class="img-fluid">
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="ps-3">
                                <h5 id="productName"></h5>
                                <div class="line">
                                    <hr class="opacity-0">
                                </div>
                                <p id="productPrice"></p>
                                <div class="title">
                                    <h6>Kategori</h6>
                                    <hr>
                                    <p id="productCategory"></p>
                                </div>
                                <div class="title">
                                    <h6>Ukuran</h6>
                                    <hr>
                                    <p id="productSize"></p>
                                </div>
                                <div class="title">
                                    <h6>Bahan</h6>
                                    <hr>
                                    <p id="productMaterial"></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Section Jasa -->
<section class="service-section">
    <div class="container py-4 mb-3">
        <div class="pb-2 service-header d-flex justify-content-center align-items-center">
            <h3 class="text-center pb-3">Jasa Yang Tersedia</h3>
        </div>
        <div class="swiper jasa_swiper pt-3 pb-4 pb-5">
            <div class="swiper-wrapper">
                <?php foreach ($jasa as $data): ?>
                    <div class="swiper-slide services-slide ">
                        <div class="card position-relative bg-logo">
                            <?php if (!empty($data->gambar_path)): ?>
                                <img src="<?= base_url('img-asset/jasa_sampel/') . $data->gambar_path; ?>"
                                    alt="Sampel <?= $data->nama_jasa; ?>" class="img-fluid">
                            <?php endif; ?>
                            <div class="overlay position-absolute px-3">
                                <h3 class="service-title"><?= $data->nama_jasa; ?></h3>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="d-flex justify-content-center link-services">
            <a href="<?= base_url('/jasa'); ?>" class="p-2 px-3 pt-2">Lihat Selengkapnya</a>
        </div>
    </div>
</section>