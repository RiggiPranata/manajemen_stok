<?php

namespace App\Models;

use CodeIgniter\Model;

class ManajemenStokModel extends Model
{
    protected $table = 'manajemen_stok';
    protected $primaryKey = 'id_transaksi';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_barang', 'id_supplier', 'stok_barang', 'barang_keluar', 'sisa_barang', 'keterangan', 'tanggal_masuk'];
}
