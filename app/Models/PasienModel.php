<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    // <================== Pasien Model start ================>

    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';
    protected $allowedFields = ['nama_pasien', 'jenkel', 'no_identitas', 'tgl_lahir', 'umur', 'alamat', 'telpon'];

    public function getIdpasien($id_pasien)
    {
        return $this->where(['id_pasien' => $id_pasien])->first();
    }
}
