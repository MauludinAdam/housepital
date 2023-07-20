<?php

namespace App\Models;

use CodeIgniter\Model;

class OrangModel extends Model
{
    // DokterModel================
    protected $table = 'orang';
    protected $allowedFields = ['nama', 'telpon', 'alamat'];
    protected $useTimestamps = true;
}
