<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_barang', 'nama_barang', 'id_katagori', 'satuan', 'harga', 'keterangan'];
}
