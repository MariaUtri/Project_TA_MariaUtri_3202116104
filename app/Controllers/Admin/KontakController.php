<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class KontakController extends BaseController
{
    public function v_kontak()
    {
        $session = session();
        $username = $session->get('username');
        $id_pengguna = $session->get('id_pengguna');
        $role = $session->get('role');
        $Kontak = $this->KontakModel
            ->select('tbl_kontak.*, tbl_pengguna.username')
            ->join('tbl_pengguna', 'tbl_kontak.id_pengguna=tbl_pengguna.id_pengguna')
            ->findAll();
        $sosmed = $this->SosmedModel
            ->select('tbl_sosmed.*, tbl_pengguna.username')
            ->join('tbl_pengguna', 'tbl_sosmed.id_pengguna=tbl_pengguna.id_pengguna')
            ->findAll();
        $data = [
            'title' => 'Kontak',
            'username' => $username,
            'id_pengguna' => $id_pengguna,
            'page' => ('admin/kontak/v_kontak'),
            'kontak' => $Kontak,
            'sosmed' => $sosmed,
            'role' => $role
        ];
        return view('admin/template/v_template', $data);
    }
    public function p_tambahKontak()
    {
        $maps = $this->request->getPost('maps');
        $mapssafe = htmlentities($maps, ENT_QUOTES, 'UTF-8');
        $this->KontakModel->save(
            [
                'id_pengguna' => esc(intval($this->request->getPost('id_pengguna'))),
                'alamat' => esc($this->request->getPost('alamat')),
                'no_telp' => esc($this->request->getPost('no_telp')),
                'email' => esc($this->request->getPost('email')),
                'maps' => $mapssafe
            ]
        );
        return redirect()->back()->with('message', 'Data Kontak berhasil ditambahkan');
    }
    public function p_editKontak()
    {
        $id_pengguna = esc(intval($this->request->getPost('id_pengguna')));
        $alamat = esc($this->request->getPost('alamat'));
        $no_telp = esc($this->request->getPost('no_telp'));
        $email = esc($this->request->getPost('email'));
        $maps = $this->request->getPost('maps');

        $db = \Config\Database::connect();
        $sql = "UPDATE tbl_kontak SET id_pengguna = ?, alamat = ?, no_telp = ?, email = ?, maps=?";
        $db->query($sql, [$id_pengguna, $alamat, $no_telp, $email, $maps]);

        return redirect()->back()->with('message', 'Data Kontak berhasil diubah');
    }

    // SOSMED
    public function p_tambahSosmed()
    {
        $this->SosmedModel->save(
            [
                'id_pengguna' => esc(intval($this->request->getPost('id_pengguna'))),
                'akun_sosmed' => esc($this->request->getPost('sosmed')),
                'link_sosmed' => esc($this->request->getPost('link')),
            ]

        );
        return redirect()->back()->with('message', 'Data Sosmed berhasil ditambah');
    }

    public function p_edit($id_sosmed)
    {
        $this->SosmedModel->save(
            [
                'id_sosmed' => $id_sosmed,
                'id_pengguna' => esc(intval($this->request->getPost('id_pengguna'))),
                'akun_sosmed' => esc($this->request->getPost('sosmed')),
                'link_sosmed' => esc($this->request->getPost('link')),
            ]

        );
        return redirect()->back()->with('message', 'Data Sosmed berhasil diubah');
    }

    public function p_hapusSosmed($id_sosmed)
    {
        $this->SosmedModel->where('id_sosmed', $id_sosmed)->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

}
