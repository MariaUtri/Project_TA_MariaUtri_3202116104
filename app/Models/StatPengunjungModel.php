<?php

namespace App\Models;

use CodeIgniter\Model;

class StatPengunjungModel extends Model
{
    protected $table = 'tbl_stat_pengunjung';
    protected $returnType = 'object';
    protected $allowedFields = ['ip', 'tanggal'];





}