<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index(): string
    {

        $session = session();
        $role = $session->get('role');
        $username = $session->get('username');

        $date = date("Y-m-d");

        $today = $this->StatPengunjungModel
            ->where('tanggal', $date)  // Memfilter data berdasarkan tanggal yang diberikan
            ->groupBy('ip')            // Mengelompokkan data berdasarkan kolom 'ip'
            ->countAllResults();       // Menghitung jumlah hasil yang dikelompokkan

        $All = $this->StatPengunjungModel->groupBy('ip')->countAllResults();


        $jasa = $this->JasaModel->countAll();
        $produk = $this->ProdukModel->countAll();

        $data = [
            'title' => 'Dashboard',
            'username' => $username,
            'page' => 'admin/dashboard/v_dashboard',
            'jasa' => $jasa,
            'produk' => $produk,
            'role' => $role,
            'today' => $today,
            'All' => $All
        ];
        return view('admin/template/v_template', $data);
    }

}
