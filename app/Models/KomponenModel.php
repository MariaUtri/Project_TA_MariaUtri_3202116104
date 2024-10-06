<?php

namespace App\Models;

use CodeIgniter\Model;

class KomponenModel extends Model
{
    protected $table = 'tbl_komponen';
    protected $primaryKey = 'id_komponen';
    protected $returnType = 'object';
    protected $allowedFields = ['id_jasa', 'nama_komponen', 'gambar_path'];





}