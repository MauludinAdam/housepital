<?php

namespace App\Controllers;

use App\Models\HousepitalModel;
use App\Models\PasienModel;

class Housepital extends BaseController
{
    protected $PasienModel;
    protected $HousepitalModel;
    public function __construct()
    {
        $this->PasienModel = new PasienModel();
        $this->HousepitalModel = new HousepitalModel();
    }

    public function index()
    {
        $session = \Config\Services::session();
        $data['session'] = $session;

        $dokter = $this->HousepitalModel->findAll();

        $data = [
            'title' => 'Data Dokter',
            'dokter' => $dokter
        ];

        return view('housepital/dokter', $data);
    }

    public function create_dokter()
    {
        $data = [
            'title' => 'Form Tambah Data Dokter'
        ];

        $session = \Config\Services::session();
        helper('form');



        if ($this->request->getMethod() == 'post') {
            $input = $this->validate([
                'nama_dok' => [
                    'label' => 'Nama Dokter',
                    'rules' => 'required|',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong',
                    ]
                ],
                'pilpol' => [
                    'label' => 'Poli Klinik',
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong',
                    ]
                ],
                'telpon_dok' => [
                    'label' => 'Telpon',
                    'rules' => 'required|min_length[12]|numeric',
                    'errors' => [
                        'required' => '{field} Harus Diisikan',
                        'min_length' => '{field} harus diisikan 12 angka'
                    ]
                ],
                'jadwal' => [
                    'label' => 'Jadwal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisikan',
                    ]
                ],

            ]);

            if ($input == true) {
                // Form validasi Berhasil 
                $model = new HousepitalModel();

                $model->save([
                    'nama_dok' => $this->request->getVar('nama_dok'),
                    'pilpol' => $this->request->getVar('pilpol'),
                    'telpon_dok' => $this->request->getVar('telpon_dok'),
                    'jadwal' => $this->request->getVar('jadwal'),
                ]);

                $session->setFlashdata('sukses', 'Data Berhasil Ditambahkan');

                return redirect()->to('/housepital');
            } else {
                // Form Validasi Gagal

                $data['validation'] = $this->validator;
            }
        }

        return view('housepital/create_dokter', $data);
    }

    public function deleteData($id_dok)
    {
        $session = \Config\Services::session();

        $this->HousepitalModel->delete($id_dok);
        $session->setFlashdata('sukses', 'Data Berhasil Dihapus');
        return redirect()->to('/housepital');
    }

    public function edit($id_dok)
    { {

            $session = \Config\Services::session();
            $dokter = $this->HousepitalModel->getIddokter($id_dok);

            helper('form');

            $data = [
                'title' => 'Form Edit Data Dokter',
                'dokter' => $dokter
            ];


            if ($this->request->getMethod() == 'post') {
                $input = $this->validate([
                    'nama_dok' => [
                        'label' => 'Nama Dokter',
                        'rules' => 'required|',
                        'errors' => [
                            'required' => '{field} Tidak Boleh Kosong',
                        ]
                    ],
                    'pilpol' => [
                        'label' => 'Poli Klinik',
                        'rules' => 'required|min_length[5]',
                        'errors' => [
                            'required' => '{field} Tidak Boleh Kosong',
                        ]
                    ],
                    'telpon_dok' => [
                        'label' => 'Telpon',
                        'rules' => 'required|min_length[12]|numeric',
                        'errors' => [
                            'required' => '{field} Harus Diisikan',
                            'min_length' => '{field} harus diisikan 12 angka'
                        ]
                    ],
                    'jadwal' => [
                        'label' => 'Jadwal',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Harus Diisikan',
                        ]
                    ],

                ]);

                if ($input == true) {
                    // Form validasi Berhasil 
                    $model = new HousepitalModel();

                    $model->save([
                        'id_dok' => $this->request->getVar('id_dok'),
                        'nama_dok' => $this->request->getVar('nama_dok'),
                        'pilpol' => $this->request->getVar('pilpol'),
                        'telpon_dok' => $this->request->getVar('telpon_dok'),
                        'jadwal' => $this->request->getVar('jadwal'),
                    ]);

                    $session->setFlashdata('sukses', 'Data Berhasil Di edit');

                    return redirect()->to('/housepital')->withInput();
                } else {
                    // Form Validasi Gagal

                    $data['validation'] = $this->validator;
                }
            }

            return view('housepital/edit', $data);
        }
    }

    // <<--================== Data Pasien Start ==========================-->>

    public function pasien()
    {
        $session = \Config\Services::session();
        $data['session'] = $session;


        $pasien = $this->PasienModel->findAll();

        $data = [
            'title' => 'Data Pasien',
            'pasien' => $pasien
        ];

        return view('pages/pasien', $data);
    }
    public function create_pasien()
    {
        $data = [
            'title' => 'Form Registrasi Pasien'
        ];

        $session = \Config\Services::session();
        helper('form');


        if ($this->request->getMethod() == 'post') {
            $input = $this->validate([
                'nama_pasien' => [
                    'label' => 'Nama Pasien',
                    'rules' => 'required|',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong',
                    ]
                ],
                'jenkel' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'required' => '{field} Tidak Boleh Kosong',
                    ]
                ],
                'no_identitas' => [
                    'label' => 'Nomor Identitas',
                    'rules' => 'required|min_length[12]|numeric',
                    'errors' => [
                        'required' => '{field} Harus Diisikan',
                        'min_length' => '{field} harus diisikan 12 angka'
                    ]
                ],
                'tgl_lahir' => [
                    'label' => 'tgl Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisikan',
                    ]
                ],
                'umur' => [
                    'label' => 'Umur',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisikan',
                    ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisikan',
                    ]
                ],
                'telpon' => [
                    'label' => 'Nomor Telpon',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisikan',
                    ]
                ],

            ]);

            if ($input == true) {
                // Form validasi Berhasil 
                $model = new PasienModel();

                $model->save([
                    'nama_pasien' => $this->request->getVar('nama_pasien'),
                    'jenkel' => $this->request->getVar('jenkel'),
                    'no_identitas' => $this->request->getVar('no_identitas'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'umur' => $this->request->getVar('umur'),
                    'alamat' => $this->request->getVar('alamat'),
                    'telpon' => $this->request->getVar('telpon'),
                ]);

                $session->setFlashdata('sukses', 'Data Pasien Berhasil Ditambahkan');

                return redirect()->to('/pasien');
            } else {
                // Form Validasi Gagal

                $data['validation'] = $this->validator;
            }
        }

        return view('pages/create_pasien', $data);
    }

    public function deletePasien($id_pasien)
    {
        $session = \Config\Services::session();
        $this->PasienModel->delete($id_pasien);

        $session->setFlashdata('sukses', 'Data Pasien Berhasil Di Hapus');

        return redirect()->to('/pasien');
    }

    public function editPasien($id_pasien)
    { {

            $session = \Config\Services::session();
            $pasien = $this->PasienModel->getIdpasien($id_pasien);

            helper('form');

            $data = [
                'title' => 'Form Edit Data Pasien',
                'pasien' => $pasien
            ];


            if ($this->request->getMethod() == 'post') {
                $input = $this->validate([
                    'nama_pasien' => [
                        'label' => 'Nama Pasien',
                        'rules' => 'required|',
                        'errors' => [
                            'required' => '{field} Tidak Boleh Kosong',
                        ]
                    ],
                    'jenkel' => [
                        'label' => 'Jenis Kelamin',
                        'rules' => 'required|min_length[5]',
                        'errors' => [
                            'required' => '{field} Tidak Boleh Kosong',
                        ]
                    ],
                    'no_identitas' => [
                        'label' => 'No Kartu Identitas',
                        'rules' => 'required|min_length[12]|numeric',
                        'errors' => [
                            'required' => '{field} Harus Diisikan',
                            'min_length' => '{field} harus diisikan 16 angka'
                        ]
                    ],
                    'tgl_lahir' => [
                        'label' => 'Tgl Lahir',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Tidak Boleh Kosong',
                        ]
                    ],
                    'umur' => [
                        'label' => 'Umur Pasien',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Tidak Boleh Kosong',
                        ]
                    ],
                    'alamat' => [
                        'label' => 'Alamat Pasien',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Tidak Boleh Kosong',
                        ]
                    ],
                    'telpon' => [
                        'label' => 'Nomor Telpon Pasien',
                        'rules' => 'required',
                        'errors' => [
                            'required' => '{field} Tidak Boleh Kosong',
                        ]
                    ],

                ]);

                if ($input == true) {
                    // Form validasi Berhasil 
                    $model = new PasienModel();

                    $model->save([
                        'id_pasien' => $this->request->getVar('id_pasien'),
                        'nama_pasien' => $this->request->getVar('nama_pasien'),
                        'jenkel' => $this->request->getVar('jenkel'),
                        'no_identitas' => $this->request->getVar('no_identitas'),
                        'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                        'umur' => $this->request->getVar('umur'),
                        'alamat' => $this->request->getVar('alamat'),
                        'telpon' => $this->request->getVar('telpon'),
                    ]);

                    $session->setFlashdata('sukses', 'Data Berhasil Di edit');

                    return redirect()->to('/pasien')->withInput();
                } else {
                    // Form Validasi Gagal

                    $data['validation'] = $this->validator;
                }
            }

            return view('pages/editPasien', $data);
        }
    }

    // <<--================== Data Pasien End ==========================-->>

}
