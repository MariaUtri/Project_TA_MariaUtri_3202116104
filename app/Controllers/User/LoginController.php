<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;

class LoginController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Login'
        ];
        helper(['form']);
        return view('user/login', $data);
    }

    public function auth()
    {
        $session = session();
        $model = new PenggunaModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong!',
                ]
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }


        $data = $model->where('username', $username)->first();
        if ($data) {
            if ($data->status == '1') {
                if ($data) {
                    $pass = $data->password;
                    $verify_pass = password_verify($password, $pass);
                    if ($verify_pass) {
                        $ses_data = [
                            'id_pengguna' => $data->id_pengguna,
                            'username' => $data->username,
                            'email' => $data->email,
                            'status' => $data->status,
                            'role' => $data->role,
                            'logged_in' => TRUE

                        ];
                        $session->set($ses_data);
                        return redirect()->to('admin/dashboard')->with('login', ('Selamat Datang ' . $username . '!'));
                    } else {
                        $session->setFlashdata('msg', 'Login Gagal! Coba lagi');
                        return redirect()->to('/login');
                    }
                } else {
                    $session->setFlashdata('msg', 'Login Gagal! Coba lagi');
                    return redirect()->to('/login');
                }
            } else {
                $session->setFlashdata('msg', 'Login Gagal! Coba lagi');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Login Gagal! Coba lagi');
            return redirect()->to('/login');
        }

    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }


}
