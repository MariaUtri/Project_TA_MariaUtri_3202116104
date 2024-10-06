<section class="product-tagline">
    <div class="container-fluid">
        <div>
            <p>Detail Produk</p>
            <h3><?= $d_produk->nama_produk; ?></h3>

        </div>
    </div>
</section>


<section class="detailProduct-section py-4 position-relative">
    <section class="img-modal">
        <div class="overlay-zoom">
            <button id="closeModalBtn" class="btn btn-transparent border-0">
                <i class="fa-solid fa-xmark text-white fs-3"></i>
            </button>
            <div id="zoomImgModal">
                <img src="<?= base_url('img-asset/produk/') . $d_produk->gambar_path; ?>"
                    alt="<?= $d_produk->nama_produk ?>" class="img-fluid">
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row p-3">
            <!-- Container untuk gambar dan ikon pembesar -->
            <div class="col-md-6 border d-flex justify-content-center align-items-center mb-4 col-img">
                <div id="zoomImg" class="container-img">
                    <img src="<?= base_url('img-asset/produk/') . $d_produk->gambar_path; ?>"
                        alt="<?= $d_produk->nama_produk ?>" class="img-fluid">
                </div>
                <div class="position-absolute icon-overlay">
                    <button id="openModalBtn" class="btn btn-transparent">
                        <i class="fa-solid fa-magnifying-glass-plus text-white"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center detail-product">
                <div class="px-1">
                    <h5 class="title-product"><?= $d_produk->nama_produk; ?></h5>
                    <div class="line">
                        <hr class="opacity-0">
                    </div>
                    <p class="pt-3 price-product">Rp. <?= number_format($d_produk->harga, 0, ',', '.'); ?></p>
                    <div class="product-detail">
                        <h6 class="pb-1">Kategori</h6>
                        <p>
                            <?= $kategori->nama_kategori; ?>
                        </p>
                    </div>
                    <div class="product-detail">
                        <h6>Ukuran</h6>
                        <p><?= $d_produk->ukuran; ?></p>
                    </div>
                    <div class="product-detail bahan">
                        <h6>Bahan</h6>
                        <p><?= $d_produk->bahan; ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>