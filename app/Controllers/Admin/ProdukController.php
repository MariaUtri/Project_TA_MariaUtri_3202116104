<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProdukController extends BaseController
{
    // view
    public function v_katProduk()
    {
        $kategori_produk = $this->KatProdukModel->orderBy('id_kat_produk', 'DESC')->findAll();
        $session = session();
        $username = $session->get('username');
        $role = $session->get('role');
        $data = [
            'title' => 'Kategori Produk',
            'username' => $username,
            'page' => 'admin/produk/v_katProduk',
            'kategori' => $kategori_produk,
            'role' => $role

        ];
        return view('admin/template/v_template', $data);
    }
    // tambah Kategori Produk
    public function tambah()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_kategori' => [
                'label' => 'Nama Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kategori tidak boleh kosong!',
                ]
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $data = [
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
        ];
        $this->KatProdukModel->save($data);

        return redirect()->back()->with('message', 'Data Kategori Produk berhasil ditambah');

    }

    // edit kategori
    public function update($id_kat_produk)
    {
        $data = [
            'id_kat_produk' => $id_kat_produk,
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
        ];

        $this->KatProdukModel->save($data);
        return redirect()->back()->with('message', 'Data Kategori Produk berhasil diubah');
    }

    // hapus kategori
    public function destroy($id_kat_produk)
    {
        $produk = $this->ProdukModel->where('id_kat_produk', $id_kat_produk)->find();
        if (empty($produk)) {
            $this->KatProdukModel->where('id_kat_produk', $id_kat_produk)->delete();
            return redirect()->back()->with('message', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data gagal dihapus karena sedang digunakan pada Produk ');
        }


    }


    public function v_produk()
    {
        $session = session();
        $username = $session->get('username');
        $role = $session->get('role');
        $daftar_produk = $this->ProdukModel->getProdukWithKategori();
        $data = [
            'title' => 'Daftar Produk',
            'username' => $username,
            'page' => ('admin/produk/v_produk'),
            'produk' => $daftar_produk,
            'role' => $role
        ];
        return view('admin/template/v_template', $data);
    }

    public function v_tambah()
    {
        $session = session();
        $username = $session->get('username');
        $role = $session->get('role');
        $kategori = $this->KatProdukModel->findAll();
        $data = [
            'title' => 'Daftar Produk',
            'username' => $username,
            'page' => ('admin/produk/v_tambah'),
            'kategori' => $kategori,
            'role' => $role
        ];
        return view('admin/template/v_template', $data);
    }


    public function p_tambah()
    {
        $session = session();
        $id_pengguna = $session->get('id_pengguna');
        $id_pengguna = intval($id_pengguna);

        $validation = \Config\Services::validation();
        $validation->setRules([
            'gambar' => [
                'label' => 'Gambar Produk',
                'rules' => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]',
                'errors' => [
                    'uploaded' => 'Gambar Produk harus diunggah!',
                    'is_image' => 'Gambar Produk harus berupa gambar!',
                    'max_size' => 'Gambar Produk tidak boleh lebih dari 2MB!',
                ],
            ],
            'nama_produk' => [
                'label' => 'Nama Produk',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Produk tidak boleh kosong!',
                ],
            ],
            'kategori_produk' => [
                'label' => 'Kategori Produk',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Produk harus dipilih!',
                ],
            ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga tidak boleh kosong!',
                    'numeric' => 'Harga harus berupa angka!',
                ],
            ],
            'bahan' => [
                'label' => 'Bahan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bahan tidak boleh kosong!',
                ],
            ],
            'ukuran' => [
                'label' => 'Ukuran',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ukuran tidak boleh kosong!',
                ],
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('gambar');
        $file->move('img-asset/produk');
        $namafile = $file->getName();

        $this->ProdukModel->save([
            'nama_produk' => esc($this->request->getPost('nama_produk')),
            'id_kat_produk' => esc($this->request->getPost('kategori_produk')),
            'id_pengguna' => $id_pengguna,
            'harga' => (int) esc($this->request->getPost('harga')),
            'bahan' => esc($this->request->getPost('bahan')),
            'ukuran' => esc($this->request->getPost('ukuran')),
            'gambar_path' => $namafile
        ]);

        return redirect()->to('admin/daftar-produk')->with('message', 'Data Produk berhasil ditambah');
    }

    // edit
    public function v_edit($id_produk)
    {
        $session = session();
        $username = $session->get('username');
        $role = $session->get('role');
        $kategori_produk = $this->KatProdukModel->findAll();
        $produk = $this->ProdukModel->find($id_produk);
        $data = [
            'title' => 'Daftar Produk',
            'username' => $username,
            'page' => ('admin/produk/v_edit'),
            'kategori' => $kategori_produk,
            'produk' => $produk,
            'role' => $role

        ];
        return view('admin/template/v_template', $data);


    }
    // tambah produk
    // edit produk
    public function p_edit($id_produk)
    {
        $session = session();
        $id_pengguna = $session->get('id_pengguna');
        $id_pengguna = intval($id_pengguna);

        $validation = \Config\Services::validation();
        $validation->setRules([
            'gambar' => [
                'label' => 'Gambar Produk',
                'rules' => 'is_image[gambar]|max_size[gambar,2048]',
                'errors' => [
                    'is_image' => 'Gambar Produk harus berupa gambar!',
                    'max_size' => 'Gambar Produk tidak boleh lebih dari 2MB!',
                ],
            ],
            'nama_produk' => [
                'label' => 'Nama Produk',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Produk tidak boleh kosong!',
                ],
            ],
            'kategori_produk' => [
                'label' => 'Kategori Produk',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Produk tidak boleh kosong!',
                ],
            ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga tidak boleh kosong!',
                    'numeric' => 'Harga harus berupa angka!',
                ],
            ],
            'bahan' => [
                'label' => 'Bahan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bahan tidak boleh kosong!',
                ],
            ],
            'ukuran' => [
                'label' => 'Ukuran',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Ukuran tidak boleh kosong!',
                ],
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $file->move('img-asset/produk');
            $namafile = $file->getName();
        } else {
            $namafile = $this->request->getPost('old_gambar');
        }


        $this->ProdukModel->save([
            'id_produk' => $id_produk,
            'nama_produk' => esc($this->request->getPost('nama_produk')),
            'id_kat_produk' => esc($this->request->getPost('kategori_produk')),
            'id_pengguna' => $id_pengguna,
            'harga' => (int) esc($this->request->getPost('harga')),
            'bahan' => esc($this->request->getPost('bahan')),
            'ukuran' => esc($this->request->getPost('ukuran')),
            'gambar_path' => $namafile
        ]);

        return redirect()->to('admin/daftar-produk')->with('message', 'Data Produk berhasil diubah');
    }

    public function p_hapus($id_produk)
    {
        $this->ProdukModel->where('id_produk', $id_produk)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');

    }


}
