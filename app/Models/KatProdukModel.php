<?php

namespace App\Models;

use CodeIgniter\Model;

class KatProdukModel extends Model
{
    protected $table = 'tbl_kat_produk';
    protected $primaryKey = 'id_kat_produk';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_kategori'];

    public function saveKatProduk($data)
    {
        return $this->save($data);
    }





}