<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelauth extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public function ceklogin($iduser)
    {
        $query = $this->table($this->table)->getWhere(['iduser' => $iduser]);
        return $query;
    }
}
