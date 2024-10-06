<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table = 'tbl_galeri';
    protected $primaryKey = 'id_galeri';
    protected $returnType = 'object';
    protected $allowedFields = ['id_pengguna', 'gambar_path', 'deskripsi'];

    // public function saveGaleri($data)
    // {
    //     return $this->save($data);
    // }





}