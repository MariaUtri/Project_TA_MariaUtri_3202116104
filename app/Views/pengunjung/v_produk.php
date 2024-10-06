<section class="product-tagline">
    <div class="container-fluid">
        <div>
            <h3><?= $judul; ?></h3>
            <p><?= $tagline; ?></p>
        </div>
    </div>
</section>

<section class="category-section py-4">
    <div class="category-header d-flex justify-content-center align-items-center">
        <h3 class="pb-3">Kategori</h3>
    </div>
    <div class="select-category py-3">
        <button class="btn active" data-category="all" onclick="filterSelection('all')">Semua</button>
        <?php foreach ($kategori as $data): ?>
            <button class="btn" data-category="<?= $data->nama_kategori; ?>"
                onclick="filterSelection('<?= $data->nama_kategori; ?>')"><?= $data->nama_kategori; ?> </button>
        <?php endforeach; ?>
    </div>

</section>


<!-- content -->
<section class=" product-section">
    <div class="container mt-2">
        <div class="header">
            <h5 class="me-2">Produk</h5>
            <div class="line"></div>
        </div>
        <div class="row justify-content-left">
            <?php foreach ($produk as $data): ?>
                <div class="col-md-4 mb-3 p-3 filterDiv <?= $data->nama_kategori; ?>">
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
                        <div class="card-content text-center pt-4 px-2">
                            <h5><?= $data->nama_produk; ?></h5>
                            <p class="card-price">Rp. <?= number_format($data->harga, 0, ',', '.'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
                        <div class="col-md-6 border d-flex justify-content-center align-items-center mb-4">
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