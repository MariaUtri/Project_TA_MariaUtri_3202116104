<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilPerusahaanModel extends Model
{
    protected $table = 'tbl_profil_perusahaan';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['sejarah', 'visi', 'misi'];

    protected bool $allowEmptyInserts = false;

    public function getProfilWithUser()
    {
        return $this->select('tbl_profil_perusahaan.*, tbl_pengguna.username')
            ->join('tbl_pengguna', 'tbl_profil_perusahaan.id_pengguna = tbl_pengguna.id_pengguna')
            ->findAll();
    }
}
