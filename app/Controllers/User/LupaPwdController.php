<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;

class LupaPwdController extends BaseController
{
    public function lupaPassword(): string
    {
        $data = [
            'title' => 'Lupa Password'
        ];
        helper(['form']);
        return view('user/lupa_password', $data);
    }

    public function send_email()
    {
        $session = session();
        $emailService = \Config\Services::email();
        $alamat_email = $this->request->getPost('email');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|',
                'errors' => [
                    'required' => 'Email tidak boleh kosong!',
                    'valid_email' => 'Format email tidak valid!',
                ]
            ],

        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }


        $user = $this->PenggunaModel->where('email', $alamat_email)->first();

        if ($user) {
            if ($user->status == '1') {
                $token = substr(bin2hex(random_bytes(25)), 0, 6);
                $username = $user->username;
                $this->PenggunaModel->update($user->id_pengguna, ['reset_token' => $token]);
                $link = base_url('/reset-password?username=' . $username . '&token=' . $token);

                $emailService->setTo($alamat_email);
                $emailService->setFrom('cp.berkahpintukreasi@gmail.com', 'Berkah Pintu Kreasi');
                $emailService->setSubject('Link Lupa Password');
                $emailService->setMessage('Click the following link to reset your password: <button> <a href="' . $link . '">' . 'reset password' . '</a></button>');
                if ($emailService->send()) {
                    session()->set('reset_requested', true);
                    $session->setFlashdata('berhasil', 'Berhasil! Email terkirim');
                    return redirect()->to('/lupa-password');
                } else {
                    $session->setFlashdata('gagal', 'Gagal! Email gagal terkirim');
                    return redirect()->to('/lupa-password');
                }
            } else {
                $session->setFlashdata('gagal', 'Gagal! Email tidak ditemukan');
                return redirect()->to('/lupa-password');
            }
        } else {
            $session->setFlashdata('gagal', 'Gagal! Email tidak ditemukan');
            return redirect()->to('/lupa-password');
        }

    }

    // reset password
    public function resetPwd()
    {
        if (!session()->get('reset_requested')) {
            return redirect()->back()->with('error', 'Akses tidak sah');
        }

        $token = $this->request->getGet('token');

        $user = $this->PenggunaModel->where('reset_token', $token)->first();

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Token tidak valid');
        } else {
            $data = [
                'title' => 'Reset Password',
                'reset_token' => $token,
                'username' => $this->request->getGet('username')
            ];
            return view('user/reset_password', $data);
        }
    }

    public function resetProcess()
    {
        // $session = session();
        $username = $this->request->getPost('username');
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');

        if (is_string($password) && !empty($password)) {
            $hashPwd = password_hash($password, PASSWORD_DEFAULT);
        }

        $user = $this->PenggunaModel->where('username', $username)
            ->where('reset_token', $token)
            ->first();

        if ($user) {
            $userData = [
                'password' => $hashPwd,
                'reset_token' => null
            ];

            $update = $this->PenggunaModel->update($user->id_pengguna, $userData);

            if ($update) {
                session()->remove('reset_requested');
                return redirect()->to('/login')->with('message', 'Password berhasil diubah.');
            } else {
                return redirect()->back()->with('gagal', 'Pengguna tidak ditemukan.');
            }
        } else {
            return redirect()->back()->with('gagal', 'Gagal! Token tidak valid');
        }



    }


}

