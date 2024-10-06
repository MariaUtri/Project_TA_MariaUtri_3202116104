<?php

namespace App\Models;

use CodeIgniter\Model;

class JasaModel extends Model
{
    protected $table = 'tbl_jasa';
    protected $primaryKey = 'id_jasa';
    protected $returnType = 'object';
    protected $allowedFields = ['id_kerjasama', 'id_pengguna', 'nama_jasa'];

    public function getJasaWithDistributor()
    {
        return $this->select('tbl_jasa.*, tbl_kerjasama.nama_perusahaan, tbl_pengguna.username')
            ->join('tbl_kerjasama', 'tbl_jasa.id_kerjasama = tbl_kerjasama.id_kerjasama')
            ->join('tbl_pengguna', 'tbl_jasa.id_pengguna = tbl_pengguna.id_pengguna')
            ->orderBy('id_jasa', 'DESC')
            ->findAll();
    }

    public function getJasaWithGambar()
    {
        return $this->select('tbl_jasa.*, tbl_gambar_jasa.gambar_path')
            ->join('tbl_gambar_jasa', 'tbl_jasa.id_jasa = tbl_gambar_jasa.id_jasa', 'left')
            ->groupBy('tbl_jasa.id_jasa')
            ->orderBy('tbl_jasa.id_jasa', 'Desc')
            ->findAll();
    }

    public function getDetailJasa($id_jasa)
    {
        return $this->select('tbl_jasa.*, tbl_gambar_jasa.gambar_path, tbl_komponen.*')
            ->join('tbl_gambar_jasa', 'tbl_jasa.id_jasa = tbl_gambar_jasa.id_jasa')
            ->join('tbl_komponen', 'tbl_jasa.id_jasa = tbl_komponen.id_jasa')
            ->where('tbl_jasa.id_jasa', $id_jasa)
            ->order_by('tbl_jasa.id_jasa', 'desc')
            ->get('tbl_jasa')
            ->row(); // Mengambil satu baris data
    }






}