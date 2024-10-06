<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'tbl_produk';
    protected $primaryKey = 'id_produk';
    protected $returnType = 'object';
    protected $allowedFields = [
        'nama_produk',
        'id_kat_produk',
        'id_pengguna',
        'harga',
        'bahan',
        'ukuran',
        'gambar_path'
    ];

    protected bool $allowEmptyInserts = false;

    public function getProdukWithKategori()
    {
        return $this->select('tbl_produk.*, tbl_kat_produk.nama_kategori, tbl_pengguna.username')
            ->join('tbl_kat_produk', 'tbl_produk.id_kat_produk = tbl_kat_produk.id_kat_produk')
            ->join('tbl_pengguna', 'tbl_produk.id_pengguna = tbl_pengguna.id_pengguna')
            ->orderBy('id_produk', 'DESC')
            ->findAll();
    }

    public function getProdukWithKategoriLimit()
    {
        return $this->select('tbl_produk.*, tbl_kat_produk.nama_kategori')
            ->join('tbl_kat_produk', 'tbl_produk.id_kat_produk = tbl_kat_produk.id_kat_produk')
            ->orderBy('id_produk', 'DESC')
            ->findAll(6);
    }



    // // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat = 'datetime';
    // protected $createdField = 'created_at';
    // protected $updatedField = 'updated_at';
    // protected $deletedField = 'deleted_at';

    // // Validation
    // protected $validationRules = [];
    // protected $validationMessages = [];
    // protected $skipValidation = false;
    // protected $cleanValidationRules = true;

    //     // Callbacks
//     protected $allowCallbacks = true;
//     protected $beforeInsert = [];
//     protected $afterInsert = [];
//     protected $beforeUpdate = [];
//     protected $afterUpdate = [];
//     protected $beforeFind = [];
//     protected $afterFind = [];
//     protected $beforeDelete = [];
//     protected $afterDelete = [];
}
