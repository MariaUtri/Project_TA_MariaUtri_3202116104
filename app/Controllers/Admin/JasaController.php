<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class JasaController extends BaseController
{
    public function v_jasa()
    {
        $session = session();
        $username = $session->get('username');
        $role = $session->get('role');
        $jasa = $this->JasaModel->getJasaWithDistributor();
        $distributor = $this->KerjasamaModel->findAll();
        // $jasa = $this->JasaModel->findAll(); // Misalnya, mengambil semua jasa
        $gambarJasaStatus = []; // Array untuk menyimpan status gambar jasa berdasarkan id_jasa
        $komponenJasa = []; // Array untuk menyimpan komponen jasa berdasarkan id_jasa

        // Mengambil gambar jasa dan komponen jasa untuk setiap id_jasa
        foreach ($jasa as $data) {
            $id_jasa = $data->id_jasa;
            $gambarJasa = $this->GambarJasaModel->where('id_jasa', $id_jasa)->first();
            $gambarJasaStatus[$id_jasa] = $gambarJasa ? 1 : 0;
            $komponenJasa[$id_jasa] = $this->KomponenModel->where('id_jasa', $id_jasa)->first();
        }


        $data = [
            'title' => 'Jasa',
            'username' => $username,
            'page' => 'admin/jasa/v_jasa',
            'jasa' => $jasa,
            'gambarJasaStatus' => $gambarJasaStatus,
            'komponenJasa' => $komponenJasa,
            'distributor' => $distributor,
            'role' => $role

        ];
        return view('admin/template/v_template', $data);
    }
    // tambah data
    public function p_tambah()
    {
        $session = session();
        $id_pengguna = $session->get('id_pengguna');
        $id_pengguna = intval($id_pengguna);

        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_jasa' => [
                'label' => 'Nama Jasa',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Jasa tidak boleh kosong!',
                ],
            ],
            'distributor' => [
                'label' => 'Distributor',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Distributor tidak boleh kosong!',
                ],
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }


        $nama = esc($this->request->getPost('nama_jasa'));
        $distributor = esc($this->request->getPost('distributor'));

        $this->JasaModel->save([
            'id_pengguna' => $id_pengguna,
            'id_kerjasama' => $distributor,
            'nama_jasa' => $nama
        ]);


        $id_jasa = $this->JasaModel->getInsertID();

        $files = $this->request->getFiles();
        if ($files) {
            foreach ($files['sampel'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $file->move('img-asset/jasa_sampel');
                    $namafile = $file->getName();
                    $this->GambarJasaModel->save([
                        'id_jasa' => $id_jasa,
                        'gambar_path' => $namafile
                    ]);
                }
            }
        }

        return redirect()->to('admin/daftar-jasa')->with('message', 'Data berhasil ditambah');

    }

    public function p_edit($id_jasa)
    {
        $session = session();
        $id_pengguna = $session->get('id_pengguna');
        $id_pengguna = intval($id_pengguna);
        $this->JasaModel->save([
            'id_jasa' => $id_jasa,
            'id_pengguna' => $id_pengguna,
            'id_kerjasama' => esc($this->request->getPost('distributor')),
            'nama_jasa' => esc($this->request->getPost('nama'))
        ]);
        return redirect()->to('admin/daftar-jasa')->with('message', 'Data berhasil ditubah');
    }

    public function p_hapus($id_jasa)
    {
        $this->GambarJasaModel->where('id_jasa', $id_jasa)->delete();
        $this->KomponenModel->where('id_jasa', $id_jasa)->delete();
        $this->JasaModel->where('id_jasa', $id_jasa)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    // sampel produk
    public function v_sampel($id_jasa)
    {
        $session = session();
        $username = $session->get('username');
        $role = $session->get('role');
        $sampel = $this->GambarJasaModel->where('id_jasa', $id_jasa)->findAll();
        $data = [
            'title' => 'Jasa',
            'username' => $username,
            'sampel' => $sampel,
            'page' => 'admin/jasa/v_sampel',
            'id_jasa' => $id_jasa,
            'role' => $role
        ];

        return view('admin/template/v_template', $data);
    }
    public function p_tambahSampel()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'sampel[]' => [
                'label' => 'Gambar sampel',
                'rules' => 'uploaded[sampel]|is_image[sampel]|max_size[sampel,2048]',
                'errors' => [
                    'uploaded' => 'Gambar belum diupload!',
                    'is_image' => 'Gambar sampel harus berupa gambar!',
                    'max_size' => 'Gambar sampel tidak boleh lebih dari 2MB!',
                ],
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $id_jasa = esc($this->request->getPost('id_jasa'));
        $files = $this->request->getFiles();
        foreach ($files['sampel'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $file->move('img-asset/jasa_sampel');
                $namafile = $file->getName();
                $this->GambarJasaModel->save([
                    'id_jasa' => $id_jasa,
                    'gambar_path' => $namafile
                ]);
            }
        }
        return redirect()->back()->with('message', 'Data berhasil ditambahkan');
    }

    public function p_hapusSampel($id_gambar_jasa)
    {
        $this->GambarJasaModel->where('id_gambar_jasa', $id_gambar_jasa)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    // komponen produk
    public function v_komponen($id_jasa)
    {
        $session = session();
        $username = $session->get('username');
        $role = $session->get('role');
        $komponen = $this->KomponenModel->where('id_jasa', $id_jasa)->findAll();
        $data = [
            'title' => 'Jasa',
            'username' => $username,
            'page' => 'admin/jasa/v_komponen',
            'id_jasa' => $id_jasa,
            'komponen' => $komponen,
            'role' => $role
        ];

        return view('admin/template/v_template', $data);
    }


    public function p_tambahKomponen()
    {

        $validation = \Config\Services::validation();
        $validation->setRules([
            'komponen' => [
                'label' => 'Gambar komponen',
                'rules' => 'uploaded[komponen]|is_image[komponen]|max_size[komponen,2048]',
                'errors' => [
                    'uploaded' => 'Gambar belum diupload!',
                    'is_image' => 'Gambar komponen harus berupa gambar!',
                    'max_size' => 'Gambar komponen tidak boleh lebih dari 2MB!',
                ],
            ],
            'nama' => [
                'label' => 'Nama Komponen',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Komponen tidak boleh kosong!',
                ]
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $id_jasa = esc($this->request->getPost('id_jasa'));
        $file = $this->request->getFile('komponen');
        $file->move('img-asset/jasa_komponen');
        $namafile = $file->getName();
        $this->KomponenModel->save([
            'id_jasa' => $id_jasa,
            'nama_komponen' => esc($this->request->getPost('nama')),
            'gambar_path' => $namafile
        ]);
        return redirect()->back()->with('message', 'Data berhasil ditambahkan');
    }

    public function p_editKomponen($id_komponen)
    {

        $file = $this->request->getFile('komponen');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $file->move('img-asset/jasa_komponen');
            $namafile = $file->getName();
        } else {
            $namafile = $this->request->getPost('old_komponen');
        }
        $data = [
            'id_komponen' => intval($id_komponen),
            'id_jasa' => intval(esc($this->request->getPost('id_jasa'))),
            'gambar_path' => $namafile,
            'nama_komponen' => esc($this->request->getPost('nama'))
        ];

        $this->KomponenModel->save($data);



        return redirect()->back()->with('message', 'Data berhasil diubah');

    }

    public function p_hapusKomponen($id_komponen)
    {
        $this->KomponenModel->where('id_komponen', $id_komponen)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }
}
