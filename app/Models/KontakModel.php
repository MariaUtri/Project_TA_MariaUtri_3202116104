<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
    protected $table = 'tbl_kontak';
    protected $primaryKey = 'id_kontak';
    protected $returnType = 'object';
    protected $allowedFields = ['id_pengguna', 'no_telp', 'alamat', 'email', 'maps'];

}