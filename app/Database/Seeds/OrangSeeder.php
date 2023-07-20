<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class OrangSeeder extends Seeder
{
    public function run()
    {
        // $data = [
        //     [
        //         'nama'          => 'Mauludin Adam',
        //         'telpon'        => '081295629312',
        //         'alamat'        => 'Jl.H.Nawi, Jatimakmur',
        //         'created_at'    => Time::now(),
        //         'updated_at'     => Time::now()
        //     ],
        //     [
        //         'nama'          => 'Siti Chijaimah',
        //         'telpon'        => '081295629234',
        //         'alamat'        => 'Kebun Jeruk Jakbar',
        //         'created_at'    => Time::now(),
        //         'updated_at'     => Time::now()
        //     ],
        //     [
        //         'nama'          => 'Sri Sumayya',
        //         'telpon'        => '081295625643',
        //         'alamat'        => 'jl.Pedurenan, JatiAsih',
        //         'created_at'    => Time::now(),
        //         'updated_at'     => Time::now()
        //     ]
        // ];
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'nama'          => $faker->name,
                'telpon'        => $faker->phoneNumber,
                'alamat'        => $faker->address,
                'created_at'    => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'     => Time::now()
            ];
            $this->db->table('orang')->insert($data);
        }

        // Simple Queries
        // $this->db->query(
        //     'INSERT INTO orang (nama, telpon, alamat, created_at, updated_at) VALUES(:nama:, :telpon:, :alamat:, :created_at:, :updated_at:)',
        //     $data
        // );

        // Using Query Builder
        // $this->db->table('orang')->insertBatch($data);
    }
}
