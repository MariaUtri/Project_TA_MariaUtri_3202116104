<?php

namespace App\Models;

use CodeIgniter\Model;

class SosmedModel extends Model
{
    protected $table = 'tbl_sosmed';
    protected $primaryKey = 'id_sosmed';
    protected $returnType = 'object';
    protected $allowedFields = ['id_pengguna', 'akun_sosmed', 'link_sosmed'];

}