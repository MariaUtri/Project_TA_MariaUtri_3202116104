<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class KerjasamaController extends BaseController
{
    public function v_kerjasama()
    {
        $session = session();
        $username = $session->get('username');
        $role = $session->get('role');
        $kerjasama = $this->KerjasamaModel
            ->select('tbl_kerjasama.*, tbl_pengguna.username')
            ->join('tbl_pengguna', 'tbl_kerjasama.id_pengguna= tbl_pengguna.id_pengguna')
            ->orderBY('id_kerjasama', 'DESC')->findAll();
        $data = [
            'title' => 'Kerja Sama',
            'username' => $username,
            'page' => ('admin/kerja-sama/v_kerjasama'),
            'kerjasama' => $kerjasama,
            'role' => $role
        ];
        return view('admin/template/v_template', $data);
    }

    public function p_tambah()
    {
        $session = session();
        $id_pengguna = intval($session->get('id_pengguna'));

        // validation
        $validation = \Config\Services::validation();
        $validation->setRules([
            'gambar' => [
                'label' => 'Logo Perusahaan',
                'rules' => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]',
                'errors' => [
                    'uploaded' => 'Gambar belum diupload!',
                    'is_image' => 'Gambar harus berupa gambar!',
                    'max_size' => 'Gambar tidak boleh lebih dari 2MB!',
                ],
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong!',
                ],
            ],
            'nama' => [
                'label' => 'Nama Perusahaan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama perusahaan tidak boleh kosong!',
                ],
            ],
            'telp' => [
                'label' => 'Nomor Telepon',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => "Nomor telepon tidak boleh kosong!",
                    'numeric' => 'Nomor telepon harus berupa angka!'
                ]
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }


        $file = $this->request->getFile('gambar');
        $file->move('img-asset/distributor');
        $namafile = $file->getName();
        $this->KerjasamaModel->save([
            'id_pengguna' => $id_pengguna,
            'logo_path' => $namafile,
            'nama_perusahaan' => esc($this->request->getPost('nama')),
            'alamat' => esc($this->request->getPost('alamat')),
            'no_telp' => esc($this->request->getPost('telp')),
        ]);

        return redirect()->to('admin/distributor')->with('message', 'Data Distributor berhasil ditambah');
    }

    public function p_edit($id_kerjasama)
    {
        $session = session();
        $id_pengguna = $session->get('id_pengguna');
        $id_pengguna = intval($id_pengguna);
        $file = $this->request->getFile('gambar');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $file->move('img-asset/distributor');
            $namafile = $file->getName();
        } else {
            $namafile = $this->request->getPost('old_gambar');
        }


        $this->KerjasamaModel->save([
            'id_kerjasama' => $id_kerjasama,
            'id_pengguna' => $id_pengguna,
            'nama_perusahaan' => esc($this->request->getPost('nama')),
            'alamat' => esc($this->request->getPost('alamat')),
            'no_telp' => esc($this->request->getPost('telp')),
            'logo_path' => $namafile,

        ]);

        return redirect()->to('admin/distributor')->with('message', 'Data Distributor berhasil diubah');
    }

    public function p_hapus($id_kerjasama)
    {
        $this->KerjasamaModel->where('id_kerjasama', $id_kerjasama)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

}
