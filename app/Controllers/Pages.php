<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Halaman Dokter'
        ];
        return view('pages/dokter', $data);
    }

    public function pasien()
    {
        $data = [
            'title' => 'Halaman Pasien'
        ];

        return view('pages/pasien', $data);
    }
    public function obat()
    {
        $data = [
            'title' => 'Halaman Obat'
        ];

        return view('pages/obat', $data);
    }
}
