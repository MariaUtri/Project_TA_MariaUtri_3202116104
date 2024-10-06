<?php

namespace App\Models;

use CodeIgniter\Model;

class KerjasamaModel extends Model
{
    protected $table = 'tbl_kerjasama';
    protected $primaryKey = 'id_kerjasama';
    protected $returnType = 'object';
    protected $allowedFields = ['id_pengguna', 'nama_perusahaan', 'alamat', 'no_telp', 'logo_path'];

}