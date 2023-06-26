<?php

namespace App\Models;

use CodeIgniter\Model;

class KatagoriModel extends Model
{
    protected $table = 'katagori';
    protected $primaryKey = 'id_katagori';
    protected $useTimestamps = true;
    protected $allowedFields = ['katagori',];
}
