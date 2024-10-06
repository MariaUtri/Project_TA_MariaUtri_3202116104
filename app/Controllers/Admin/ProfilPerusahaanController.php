<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProfilPerusahaanModel;
use App\Models\PenggunaModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProfilPerusahaanController extends BaseController
{
    public function index()
    {
        $session = session();
        $id_pengguna = $session->get('id_pengguna');
        $username = $session->get('username');
        $role = $session->get('role');
        $profil = $this->ProfilPerusahaanModel->getProfilWithUser();
        $data = [
            'title' => 'Profil Perusahaan',
            'id_pengguna' => $id_pengguna,
            'username' => $username,
            'page' => 'admin/profil-perusahaan/v_profil',
            'profil_perusahaan' => $profil,
            'role' => $role
        ];

        return view('admin/template/v_template', $data);
    }

    // tambah data
    public function v_tambah()
    {
        $session = session();
        $id_pengguna = $session->get('id_pengguna');
        $username = $session->get('username');
        $role = $session->get('role');
        $data = [
            'title' => 'Profil Perusahaan',
            'id_pengguna' => $id_pengguna,
            'username' => $username,
            'page' => 'admin/profil-perusahaan/v_tambah',
            'role' => $role
        ];

        return view('admin/template/v_template', $data);
    }

    public function store()
    {
        $session = session();
        $id_pengguna = $session->get('id_pengguna');
        $id_pengguna = intval($id_pengguna);

        $sejarah = $this->request->getPost('sejarah');
        $visi = $this->request->getPost('visi');
        $misi = $this->request->getPost('misi');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'sejarah' => [
                'label' => 'Sejarah',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Sejarah tidak boleh kosong!',
                ]
            ],
            'visi' => [
                'label' => 'Visi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Visi tidak boleh kosong!',
                ]
            ],
            'misi' => [
                'label' => 'Misi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Misi tidak boleh kosong!',
                ]
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $db = \Config\Database::connect();
        $sql = "INSERT INTO `tbl_profil_perusahaan`(`id_pengguna`, `sejarah`, `visi`, `misi`) VALUES (?, ?, ?, ?)";
        $db->query($sql, [$id_pengguna, $sejarah, $visi, $misi]);

        // Redirect dengan pesan sukses
        return redirect()->to('admin/profil-perusahaan')->with('message', 'Ditambah');
    }

    // edit data
    public function v_edit()
    {
        $session = session();
        $username = $session->get('username');
        $role = $session->get('role');
        $profil = $this->ProfilPerusahaanModel->getProfilWithUser();
        $data = [
            'title' => 'Profil Perusahaan',
            'username' => $username,
            'page' => 'admin/profil-perusahaan/v_edit',
            'profil_perusahaan' => $profil,
            'role' => $role
        ];

        return view('admin/template/v_template', $data);
    }

    public function updateAll()
    {
        $session = session();
        $id_pengguna = $session->get('id_pengguna');

        $id_pengguna = intval($id_pengguna);

        $sejarah = $this->request->getPost('sejarah');
        $visi = $this->request->getPost('visi');
        $misi = $this->request->getPost('misi');

        $db = \Config\Database::connect();
        $sql = "UPDATE tbl_profil_perusahaan SET id_pengguna = ?, sejarah = ?, visi = ?, misi = ?";
        $db->query($sql, [$id_pengguna, $sejarah, $visi, $misi]); // Parameter bind

        return redirect()->to('admin/profil-perusahaan')->with('message', 'Profil Perusahaan berhasil diubah');
    }
}
