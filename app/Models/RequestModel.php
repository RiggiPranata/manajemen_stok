<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestModel extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_barang', 'id_user', 'jumlah', 'total_harga', 'tanggal_penjualan'];
}
