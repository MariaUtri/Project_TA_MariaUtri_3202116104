<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{

    public function v_profilPengguna()
    {
        $session = session();
        $username = $session->get('username');
        $id_pengguna = $session->get('id_pengguna');
        $role = $session->get('role');
        $user = $this->PenggunaModel->where('id_pengguna', $id_pengguna)->first();

        $data = [
            'title' => 'Profil Pengguna',
            'id_pengguna' => $id_pengguna,
            'username' => $username,
            'page' => ('admin/pengguna/v_profilPengguna'),
            'user' => $user,
            'role' => $role

        ];
        return view('admin/template/v_template', $data);
    }

    public function p_edit($id_pengguna)
    {
        // Ambil data dari form
        $username = esc($this->request->getPost('username'));
        $password = $this->request->getPost('password');
        $email = esc($this->request->getPost('email'));
        // Ambil data pengguna dari database
        $pengguna = $this->PenggunaModel->find($id_pengguna);




        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[6]|alpha_numeric',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'min_length' => 'Username harus memiliki minimal 6 karakter',
                    'alpha_numeric' => 'Username hanya terdiri dari huruf dan angka!'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Format email tidak valid.',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password harus memiliki minimal 6 karakter'
                ]
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }


        if (($pengguna->password == $password && strlen($password) == 60)) {
            $hashPwd = $pengguna->password;
        } else {
            $hashPwd = password_hash($password, PASSWORD_DEFAULT);
        }


        $data = [
            'id_pengguna' => $id_pengguna,
            'username' => $username,
            'email' => $email,
            'password' => $hashPwd
        ];
        $this->PenggunaModel->save($data);

        return redirect()->back()->with('message', 'Data User berhasil diperbarui');



    }


}
