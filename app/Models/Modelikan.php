<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelikan extends Model
{
    protected $table = 'tbl_ikan';
    protected $primaryKey = 'id_ikan';

    protected $allowedFields = ['id_ikan', 'kode_ikan', 'nama_ikan', 'kategori', 'harga'];
}
