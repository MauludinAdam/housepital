<?php

namespace App\Models;

use CodeIgniter\Model;

class HousepitalModel extends Model
{
    // <================== DokterModel start ================>

    protected $table = 'dokter';
    protected $primaryKey = 'id_dok';
    protected $allowedFields = ['nama_dok', 'pilpol', 'telpon_dok', 'jadwal'];
    protected $useTimestamps = true;

    public function getIddokter($id_dok)
    {
        return $this->where(['id_dok' => $id_dok])->first();
    }
}
