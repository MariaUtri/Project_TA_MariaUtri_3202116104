<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?> | Berkah pintu Kreasi</title>
    <meta name="description" content="<?= $content; ?>">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- bs 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- fontawasome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('asset-admin'); ?>/plugins/fontawesome-free/css/all.min.css">

    <!-- mystyle -->
    <link rel="stylesheet" href="<?= base_url('asset-pengunjung'); ?>/style/style.css">
</head>

<body class="position-relative">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand me-auto ps-2" href="<?= base_url('/beranda'); ?>">
                <img src="<?= base_url('asset-pengunjung'); ?>/img/logo.png" class="img-fluid"
                    alt="Logo CV. Berkah Pintu Kreasi" style="width:50px;">
            </a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-logo" id="offcanvasNavbarLabel">
                        <img src="<?= base_url('asset-pengunjung'); ?>/img/logo.png" class="img-fluid"
                            alt="Logo CV. Berkah Pintu Kreasi" style="width:50px;">
                        Berkah Pintu Kreasi
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3 ">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 <?php echo isset($page) && $page == 'pengunjung/v_beranda' ? 'active' : ''; ?>"
                                aria-current="page" href="<?= base_url('/beranda'); ?>">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/tentang-kami'); ?>"
                                class="nav-link mx-lg-2 <?php echo isset($page) && $page == 'pengunjung/v_profil' ? 'active' : ''; ?>">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 <?php echo (isset($page) && in_array($page, ['pengunjung/v_produk', 'pengunjung/v_produkDetail'])) ? 'active' : ''; ?>"
                                href="<?= base_url('/produk'); ?>">Produk</a>
                        </li>
                        <li class="nav-item mx-lg-2">
                            <a class="nav-link <?php echo (isset($page) && in_array($page, ['pengunjung/v_jasa', 'pengunjung/v_jasaDetail'])) ? 'active' : ''; ?>"
                                href="<?= base_url('/jasa'); ?>">Jasa</a>
                        </li>
                        <li class="nav-item mx-lg-2">
                            <a class="nav-link <?php echo isset($page) && $page == 'pengunjung/v_kontak' ? 'active' : ''; ?>"
                                href="<?= base_url('/kontak'); ?>">Kontak</a>
                        </li>
                        <li class="nav-item mx-lg-2">
                            <a class="nav-link <?php echo isset($page) && $page == 'pengunjung/v_dokumentasi' ? 'active' : ''; ?>"
                                href="
                                <?= base_url('/dokumentasi'); ?>">Dokumentasi</a>
                        </li>
                        <li class="nav-item mx-lg-2">
                            <a class="nav-link <?php echo isset($page) && $page == 'pengunjung/v_kerjasama' ? 'active' : ''; ?>"
                                href="<?= base_url('/distributor'); ?>">Distributor</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="<?= base_url('/login'); ?>"
                class="me-2 text-white rounded-pill bg-logo px-3 py-1 text-decoration-none">
                <div>
                    Login
                </div>
            </a>
            <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <?php if ($page == 'pengunjung/v_beranda'): ?>
        <!-- Section 1: Tagline -->
        <section class="tagline-section ">
            <div class="container text-center d-flex justify-content-center align-items-center">
                <div class="">
                    <h1 class="display-4"><?= $judul; ?></h1>
                    <p class="lead"><?= $tagline; ?></p>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- content -->
    <?php
    if ($page) {
        echo view($page);
    } ?>


    <?php if ($page != 'pengunjung/v_kontak'): ?>
        <!-- Footer -->
        <footer class="footer-section text-dark">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-3 text-center text-md-left mb-3">
                        <img src="<?= base_url('asset-pengunjung'); ?>/img/logo.png" alt="Logo CV. Berkah Pintu Kreasi"
                            class="mb-2 img-fluid">
                        <h5>Berkah Pintu Kreasi</h5>
                        <p>Design & Build</p>
                    </div>
                    <div class="col-md-3 mb-3">
                        <h5>Alamat</h5>
                        <p class="text-secondary-subtle">
                            <?= $kontak[0]->alamat; ?>
                        </p>
                    </div>
                    <div class="col-md-3 mb-3">
                        <h5>Hubungi Kami</h5>
                        <p>
                            <i class="fas fa-phone me-1"></i> <?= $kontak[0]->no_telp; ?>
                            <br>
                            <i class="fas fa-envelope me-2"></i><?= $kontak[0]->email; ?>
                        </p>
                    </div>
                    <div class="col-md-3 mb-3">
                        <h5>Sosial Media</h5>
                        <div class="social-links">
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
        </footer>
        <!-- End Footer -->
    <?php endif; ?>
    <div class="text-center py-2 bg-secondary">
        <small>&copy; 2024 CV.BerkahPintuKreasi. All Rights Reserved.</small>
    </div>

    <!-- B5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script src="<?= base_url('asset-pengunjung/'); ?>js/swiper.js"></script>
    <script src="<?= base_url('asset-pengunjung/'); ?>js/index.js"></script>
    <?php if ($page == 'pengunjung/v_beranda' || $page == 'pengunjung/v_produk'): ?>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const detailButtons = document.querySelectorAll('[id^="detailButton"]');

                detailButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        const productId = this.id.replace('detailButton', '');
                        const productData = produk.find(product => product.id_produk == productId);

                        // Populate modal with product data
                        document.getElementById('productImage').src = '<?= base_url('/img-asset/produk/') ?>' + productData.gambar_path;
                        document.getElementById('productName').textContent = productData.nama_produk;
                        document.getElementById('productPrice').textContent = 'Rp. ' + new Intl.NumberFormat('id-ID').format(productData.harga);
                        document.getElementById('productCategory').textContent = productData.nama_kategori;
                        document.getElementById('productSize').textContent = productData.ukuran;
                        document.getElementById('productMaterial').textContent = productData.bahan;

                        // Show the modal
                        new bootstrap.Modal(document.getElementById('productDetailModal')).show();
                    });
                });
            });

            // Assuming you have a product data array available
            const produk = <?= json_encode($produk); ?>;

        </script>
    <?php endif; ?>
    <script>
        const container = document.getElementById("zoomImg");
        const img = container.querySelector("img");

        container.addEventListener("mousemove", (e) => {
            const rect = container.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100; // Menghitung posisi relatif kursor terhadap lebar container dalam persentase
            const y = ((e.clientY - rect.top) / rect.height) * 100; // Menghitung posisi relatif kursor terhadap tinggi container dalam persentase

            console.log(x, y); // Debugging: mencetak posisi kursor dalam persentase

            img.style.transformOrigin = `${x}% ${y}%`; // Menggunakan persentase untuk memastikan transformasi berlaku merata
            img.style.transform = "scale(2)";
        });

        container.addEventListener("mouseleave", () => {
            img.style.transform = "scale(1)";
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const openModalBtn = document.getElementById('openModalBtn');
            const modalImg = document.querySelector('.img-modal');
            const closeModalBtn = document.getElementById('closeModalBtn');
            const body = document.body;

            function showModal() {
                modalImg.style.display = 'block'; // Menampilkan modal
                body.classList.add('no-scroll'); // Menambahkan kelas no-scroll pada body
            }

            function hideModal() {
                modalImg.style.display = 'none';
                body.classList.remove('no-scroll');
            }


            openModalBtn.addEventListener('click', showModal);
            closeModalBtn.addEventListener('click', hideModal);
            modalImg.addEventListener('click', (e) => {
                if (e.target === modalImg) {
                    hideModal();
                }
            });

        })
    </script>
    <script>
        const containerM = document.getElementById("zoomImgModal");
        const imgM = containerM.querySelector("img");

        imgM.addEventListener("mousemove", (e) => {
            const rect = containerM.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100; // Menghitung posisi relatif kursor terhadap lebar container dalam persentase
            const y = ((e.clientY - rect.top) / rect.height) * 100; // Menghitung posisi relatif kursor terhadap tinggi container dalam persentase

            console.log(x, y); // Debugging: mencetak posisi kursor dalam persentase

            imgM.style.transformOrigin = `${x}% ${y}%`; // Menggunakan persentase untuk memastikan transformasi berlaku merata
            imgM.style.transform = "scale(2)";
        });

        containerM.addEventListener("mouseleave", () => {
            imgM.style.transform = "scale(1)";
        });
    </script>
</body>

</html>