<?php

namespace App\Controllers\Pengunjung;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class PagesController extends BaseController
{

    public function index()
    {
        return redirect()->to('/beranda');
    }
    public function v_Beranda(): string
    {
        $log = $this->StatPengunjungModel
            ->where('ip', $this->request->getIPAddress())
            ->where('tanggal', date("Y-m-d"))
            ->first();

        date_default_timezone_set('Asia/Jakarta');
        $ipAddress = $this->request->getIPAddress();
        $accessTime = date("Y-m-d");
        $acces_log = [
            'ip' => $ipAddress,
            'tanggal' => $accessTime
        ];

        if (!$log) {
            $this->StatPengunjungModel->save($acces_log);
        }

        $profil = $this->ProfilPerusahaanModel->findAll();
        $kontak = $this->KontakModel->findAll();
        $sosmed = $this->SosmedModel->findAll();
        $produk = $this->ProdukModel->getProdukWithKategoriLimit();
        $jasa = $this->JasaModel->getJasaWithGambar();
        $data = [
            'title' => 'Beranda',
            'content' => 'Selamat datang di CV. Berkah Pintu Kreasi, ahli Jasa Konstruksi dan Furnitur HPL. Kami siap memenuhi kebutuhan Jasa Konstruksi dan Bangunan Anda dengan solusi terbaik.',
            'page' => 'pengunjung/v_beranda',
            'judul' => 'Berkah Pintu Kreasi',
            'tagline' => 'Design & Build Your Dream House',
            'profil' => $profil,
            'kontak' => $kontak,
            'sosmed' => $sosmed,
            'produk' => $produk,
            'jasa' => $jasa,
        ];
        return view('pengunjung/template', $data);
    }

    public function v_profil()
    {
        $log = $this->StatPengunjungModel
            ->where('ip', $this->request->getIPAddress())
            ->where('tanggal', date("Y-m-d"))
            ->first();

        date_default_timezone_set('Asia/Jakarta');
        $ipAddress = $this->request->getIPAddress();
        $accessTime = date("Y-m-d");
        $acces_log = [
            'ip' => $ipAddress,
            'tanggal' => $accessTime
        ];

        if (!$log) {
            $this->StatPengunjungModel->save($acces_log);
        }



        $profil = $this->ProfilPerusahaanModel->findAll();
        $kontak = $this->KontakModel->findAll();
        $sosmed = $this->SosmedModel->findAll();

        $data = [
            'title' => 'Tentang Kami',
            'content' => 'Pelajari lebih lanjut tentang CV. Berkah Pintu Kreasi, Perusahaan Konstruksi dan Furnitur yang berkomitmen menghadirkan kualitas terbaik. Temukan Jasa Konstruksi dan Bangunan inovatif kami.',
            'page' => 'pengunjung/v_profil',
            'bg' => base_url('asset-pengunjung/img/home_bg.png'),
            'judul' => 'Tentang Kami',
            'tagline' => 'Perusahaan Jasa Konstruksi & Furnitur',
            'data' => $profil,
            'kontak' => $kontak,
            'sosmed' => $sosmed,
        ];
        return view('pengunjung/template', $data);
    }

    // produk
    public function v_produk()
    {

        $log = $this->StatPengunjungModel
            ->where('ip', $this->request->getIPAddress())
            ->where('tanggal', date("Y-m-d"))
            ->first();

        date_default_timezone_set('Asia/Jakarta');
        $ipAddress = $this->request->getIPAddress();
        $accessTime = date("Y-m-d");
        $acces_log = [
            'ip' => $ipAddress,
            'tanggal' => $accessTime
        ];

        if (!$log) {
            $this->StatPengunjungModel->save($acces_log);
        }

        $kontak = $this->KontakModel->findAll();
        $sosmed = $this->SosmedModel->findAll();
        $produk = $this->ProdukModel->getProdukWithKategori();
        $kategori = $this->KatProdukModel->findAll();

        $data = [
            'title' => 'Produk',
            'content' => 'Jelajahi koleksi furnitur terbaru CV. Berkah Pintu Kreasi, termasuk Ukuran Coffee Table yang ideal. Kami menggunakan Bahan HPL untuk Furnitur, menawarkan gaya dan kenyamanan terbaik.',
            'page' => 'pengunjung/v_produk',
            'bg' => base_url('asset-pengunjung/img/home_bg.png'),
            'judul' => 'Produk Kami',
            'tagline' => 'Dibuat dengan bahan berkualitas',
            'kontak' => $kontak,
            'sosmed' => $sosmed,
            'produk' => $produk,
            'kategori' => $kategori,
        ];
        return view('pengunjung/template', $data);
    }

    public function v_produkDetail($id_produk)
    {

        $detailProduk = $this->ProdukModel->where('id_produk', $id_produk)->findAll();
        $d_produk = $this->ProdukModel->find($id_produk);
        $kontak = $this->KontakModel->findAll();
        $sosmed = $this->SosmedModel->findAll();
        $produk = $this->ProdukModel->getProdukWithKategori();
        $kategori = $this->KatProdukModel->find($d_produk->id_kat_produk);

        $data = [
            'title' => 'Detail Produk',
            'content' => 'Jelajahi koleksi furnitur terbaru CV. Berkah Pintu Kreasi, termasuk Ukuran Coffee Table yang ideal. Kami menggunakan Bahan HPL untuk Furnitur, menawarkan gaya dan kenyamanan terbaik.',
            'page' => 'pengunjung/v_produkDetail',
            'bg' => base_url('asset-pengunjung/img/home_bg.png'),
            'detailProduk' => $detailProduk,
            'd_produk' => $d_produk,
            'kontak' => $kontak,
            'sosmed' => $sosmed,
            'produk' => $produk,
            'kategori' => $kategori,
        ];
        return view('pengunjung/template', $data);
    }

    public function v_jasa()
    {

        $log = $this->StatPengunjungModel
            ->where('ip', $this->request->getIPAddress())
            ->where('tanggal', date("Y-m-d"))
            ->first();
        date_default_timezone_set('Asia/Jakarta');
        $ipAddress = $this->request->getIPAddress();
        $accessTime = date("Y-m-d");
        $acces_log = [
            'ip' => $ipAddress,
            'tanggal' => $accessTime
        ];

        if (!$log) {
            $this->StatPengunjungModel->save($acces_log);
        }

        $kontak = $this->KontakModel->findAll();
        $sosmed = $this->SosmedModel->findAll();
        $jasa = $this->JasaModel->getJasaWithGambar();

        $data = [
            'title' => 'Jasa',
            'content' => 'CV. Berkah Pintu Kreasi menyediakan jasa konstruksi profesional untuk berbagai kebutuhan bangunan Anda. Kami ahli dalam Pemasangan Pintu Kayu Garasi, Pemasangan Jendela, Pasang Kaca Jendela, dan Railing Besi. Dapatkan hasil terbaik dengan tim ahli dan solusi inovatif kami.',
            'page' => 'pengunjung/v_jasa',
            'bg' => base_url('asset-pengunjung/img/home_bg.png'),
            'judul' => 'Jasa Kami',
            'tagline' => 'Kami melayani dengan sepenuh hati',
            'kontak' => $kontak,
            'sosmed' => $sosmed,
            'jasa' => $jasa,
        ];
        return view('pengunjung/template', $data);
    }

    public function v_jasaDetail($id_jasa)
    {
        $kontak = $this->KontakModel->findAll();
        $sosmed = $this->SosmedModel->findAll();
        $detail_jasa = $this->GambarJasaModel->where('id_jasa', $id_jasa)->findAll();
        $jasa = $this->JasaModel->find($id_jasa);
        $komponen = $this->KomponenModel->where('id_jasa', $id_jasa)->findAll();
        $more = $this->JasaModel->getJasaWithGambar();


        $data = [
            'title' => 'Jasa',
            'content' => 'CV. Berkah Pintu Kreasi menyediakan jasa konstruksi profesional untuk berbagai kebutuhan bangunan Anda. Kami ahli dalam Pemasangan Pintu Kayu Garasi, Pemasangan Jendela, Pasang Kaca Jendela, dan Railing Besi. Dapatkan hasil terbaik dengan tim ahli dan solusi inovatif kami.',
            'page' => 'pengunjung/v_jasaDetail',
            'kontak' => $kontak,
            'sosmed' => $sosmed,
            'detail' => $detail_jasa,
            'd_detail' => $jasa,
            'komponen' => $komponen,
            'more' => $more,
            'id_jasa' => $id_jasa,
        ];
        return view('pengunjung/template', $data);
    }

    public function v_kontak()
    {

        $log = $this->StatPengunjungModel
            ->where('ip', $this->request->getIPAddress())
            ->where('tanggal', date("Y-m-d"))
            ->first();
        date_default_timezone_set('Asia/Jakarta');
        $ipAddress = $this->request->getIPAddress();
        $accessTime = date("Y-m-d");
        $acces_log = [
            'ip' => $ipAddress,
            'tanggal' => $accessTime
        ];

        if (!$log) {
            $this->StatPengunjungModel->save($acces_log);
        }

        $kontak = $this->KontakModel->findAll();
        $sosmed = $this->SosmedModel->findAll();
        $data = [
            'title' => 'Kontak',
            'content' => 'Hubungi CV. Berkah Pintu Kreasi di Pontianak untuk informasi produk dan layanan. Kami siap membantu semua kebutuhan furnitur dan konstruksi Anda. Temukan nomor telepon perusahaan untuk menghubungi Kami.',
            'page' => 'pengunjung/v_kontak',
            'judul' => 'Kontak',
            'tagline' => 'Kami siap menanggapi Anda',
            'kontak' => $kontak,
            'sosmed' => $sosmed,

        ];
        return view('pengunjung/template', $data);
    }

    //Dokumentasi
    public function v_dokumentasi(): string
    {

        $log = $this->StatPengunjungModel
            ->where('ip', $this->request->getIPAddress())
            ->where('tanggal', date("Y-m-d"))
            ->first();
        date_default_timezone_set('Asia/Jakarta');
        $ipAddress = $this->request->getIPAddress();
        $accessTime = date("Y-m-d");
        $acces_log = [
            'ip' => $ipAddress,
            'tanggal' => $accessTime
        ];

        if (!$log) {
            $this->StatPengunjungModel->save($acces_log);
        }

        $dokumentasi = $this->GaleriModel->findAll();
        $kontak = $this->KontakModel->findAll();
        $sosmed = $this->SosmedModel->findAll();
        $data = [
            'title' => 'Dokumentasi',
            'content' => 'Lihat dokumentasi proyek terbaru CV. Berkah Pintu Kreasi. Kami bangga menampilkan proyek berkualitas tinggi, termasuk pemasangan pintu dan pemasangan jendela, sebagai perusahaan konstruksi terkemuka dalam konstruksi bangunan.',
            'page' => 'pengunjung/v_dokumentasi',
            'bg' => base_url('asset-pengunjung/img/home_bg.png'),
            'judul' => 'Dokumentasi',
            'tagline' => 'Proyek Yang Kami Kerjakan',
            'dokumentasi' => $dokumentasi,
            'kontak' => $kontak,
            'sosmed' => $sosmed,
        ];
        return view('pengunjung/template', $data);

    }

    //KerjaSama 
    public function v_kerjasama(): string
    {

        $log = $this->StatPengunjungModel
            ->where('ip', $this->request->getIPAddress())
            ->where('tanggal', date("Y-m-d"))
            ->first();
        date_default_timezone_set('Asia/Jakarta');
        $ipAddress = $this->request->getIPAddress();
        $accessTime = date("Y-m-d");
        $acces_log = [
            'ip' => $ipAddress,
            'tanggal' => $accessTime
        ];

        if (!$log) {
            $this->StatPengunjungModel->save($acces_log);
        }

        $kerjasama = $this->KerjasamaModel->findAll();
        $kontak = $this->KontakModel->findAll();
        $sosmed = $this->SosmedModel->findAll();
        $data = [
            'title' => 'Distributor',
            'content' => 'Temukan daftar distributor resmi dan mitra CV. Berkah Pintu Kreasi. Kami menawarkan bentuk kerja sama yang saling menguntungkan. Bersama distributor produk kami, ciptakan solusi terbaik untuk kebutuhan furnitur dan konstruksi Anda.',
            'page' => 'pengunjung/v_kerjasama',
            'bg' => base_url('asset-pengunjung/img/home_bg.png'),
            'judul' => 'Distributor',
            'tagline' => 'Kami bekerja sama dengan distributor terpercaya',
            'distributor' => $kerjasama,
            'kontak' => $kontak,
            'sosmed' => $sosmed,
        ];
        return view('pengunjung/template', $data);

    }
}
