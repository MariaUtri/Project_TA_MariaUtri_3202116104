<?php
namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'tbl_pengguna';
    protected $returnType = 'object';
    protected $primaryKey = 'id_pengguna';
    protected $allowedFields = ['username', 'email', 'password', 'reset_token', 'status', 'role'];
    protected $beforeInsert = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            if (strlen($data['data']['password']) < 60) {
                $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            }
        }
        return $data;
    }
}
