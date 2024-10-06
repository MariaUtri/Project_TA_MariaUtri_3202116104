<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarJasaModel extends Model
{
    protected $table = 'tbl_gambar_jasa';

    protected $primarykey = 'id_gambar_jasa';
    protected $returnType = 'object';
    protected $allowedFields = ['id_jasa', 'gambar_path'];





}