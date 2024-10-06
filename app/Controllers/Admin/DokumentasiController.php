<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DokumentasiController extends BaseController
{
    public function v_dokumentasi(): string
    {
        $session = session();
        $username = $session->get('username');
        $role = $session->get('role');
        $dokumentasi = $this->GaleriModel->select('tbl_galeri.*, tbl_pengguna.username')
            ->join('tbl_pengguna', 'tbl_galeri.id_pengguna=tbl_pengguna.id_pengguna')
            ->orderBy('id_galeri', 'DESC')->findAll();
        $data = [
            'title' => 'Dokumentasi',
            'username' => $username,
            'page' => ('admin/dokumentasi/v_dokumentasi'),
            'dokumentasi' => $dokumentasi,
            'role' => $role
        ];
        return view('admin/template/v_template', $data);
    }

    public function p_tambah()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'gambar' => [
                'label' => 'Gambar ',
                'rules' => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]',
                'errors' => [
                    'uploaded' => 'Gambar belum diupload!',
                    'is_image' => 'Gambar gambar harus berupa gambar!',
                    'max_size' => 'Gambar gambar tidak boleh lebih dari 2MB!',
                ],
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi tidak boleh kosong!',
                ]
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }



        $session = session();
        $id_pengguna = intval($session->get('id_pengguna'));
        $file = $this->request->getFile('gambar');
        $file->move('img-asset/galeri');
        $namafile = $file->getName();
        $this->GaleriModel->save([
            'id_pengguna' => $id_pengguna,
            'gambar_path' => $namafile,
            'deskripsi' => esc($this->request->getPost('deskripsi'))
        ]);

        return redirect()->to('admin/dokumentasi')->with('message', 'Data Dokumentasi berhasil ditambah');
    }

    public function p_edit($id_galeri)
    {
        $session = session();
        $id_pengguna = $session->get('id_pengguna');
        $id_pengguna = intval($id_pengguna);
        $file = $this->request->getFile('gambar');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $file->move('img-asset/galeri');
            $namafile = $file->getName();
        } else {
            $namafile = $this->request->getPost('old_gambar');
        }


        $this->GaleriModel->save([
            'id_galeri' => $id_galeri,
            'gambar_path' => $namafile,
            'deskripsi' => esc($this->request->getPost('deskripsi')),
            'id_pengguna' => $id_pengguna,
        ]);

        return redirect()->to('admin/dokumentasi')->with('message', 'Data Dokumentasi berhasil diubah');
    }

    public function p_hapus($id_galeri)
    {
        $this->GaleriModel->where('id_galeri', $id_galeri)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

}
