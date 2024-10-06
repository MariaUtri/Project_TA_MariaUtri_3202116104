<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\HTTP\ResponseInterface;

class KelolaPenggunaController extends BaseController
{

    public function v_kelolaPengguna()
    {
        $session = session();
        $role = $session->get('role');
        if ($role != 'Admin') {
            return redirect()->back()->with('error', 'Akses tidak sah');
        }

        $username = $session->get('username');
        $id_pengguna = $session->get('id_pengguna');
        $user = $this->PenggunaModel
            ->findAll();

        $data = [
            'title' => 'Kelola Pengguna',
            'username' => $username,
            'page' => ('admin/kelola-pengguna/v_kelolaPengguna'),
            'id_pengguna' => $id_pengguna,
            'user' => $user,
            'role' => $role

        ];
        return view('admin/template/v_template', $data);
    }

    public function p_tambah()
    {
        //validation
        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[tbl_pengguna.username]|min_length[6]|alpha_numeric',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'is_unique' => 'Username sudah digunakan.',
                    'min_length' => 'Username harus memiliki minimal 6 karakter',
                    'alpha_numeric' => 'Username hanya boleh terdiri dari huruf dan angka!'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[tbl_pengguna.email]',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Format email tidak valid.',
                    'is_unique' => 'Email sudah digunakan.'
                ]
            ],
            'role' => [
                'label' => 'role pengguna',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role Pengguna harus dipilih!'
                ]
            ]

        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }



        $username = esc($this->request->getPost('username'));
        $email = esc($this->request->getPost('email'));
        $password = esc($this->request->getPost('password'));
        $role = esc($this->request->getPost('role'));
        // Simpan user ke database
        $data = [
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'role' => $role
        ];
        $this->PenggunaModel->save($data);

        return redirect()->back()->with('message', 'Pengguna berhasil didaftarkan.');
    }

    public function p_edit($id_pengguna)
    {
        $username = esc($this->request->getPost('username'));
        $email = esc($this->request->getPost('email'));
        $password = esc($this->request->getPost('password'));
        $role = esc($this->request->getPost('role'));
        $status = esc($this->request->getPost('status'));
        // Simpan user ke database
        $data = [
            'id_pengguna' => $id_pengguna,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'role' => $role,
            'status' => $status
        ];
        $this->PenggunaModel->save($data);
        return redirect()->back()->with('message', 'Pengguna berhasil diubah.');

    }

    public function p_hapus($id_pengguna)
    {
        try {
            $this->PenggunaModel->delete($id_pengguna);
            return redirect()->back()->with('message', 'Data berhasil dihapus');
        } catch (DatabaseException $e) {
            if ($e->getCode() == 1451) { // 1451 adalah kode error MySQL untuk foreign key constraint
                return redirect()->back()->with('error', 'Data tidak dapat dihapus karena memiliki riwayat. Nonaktifkan untuk opsi lain');
            } else {
                return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data. Silakan coba lagi.');
            }
        } catch (\Exception $e) {
            // Tangkap exception umum jika terjadi error lain
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi nanti.');
        }

    }
}


