<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataAtlitsPB;

class DataAtlitsPBSeeder extends Seeder
{
    public function run()
    {
        // Data yang ingin Anda masukkan
        $data = [
            [
                'Nama' => 'Ayunda',
                'namaPanggilan' => 'Ayunda',
                'banyakAbsen' => 0,
            ],
            [
                'Nama' => 'Kamila',
                'namaPanggilan' => 'Kamila',
                'banyakAbsen' => 0,
            ],
            // Anda dapat menambahkan data lain di sini jika diperlukan
        ];

        // Masukkan data ke dalam tabel
        foreach ($data as $item) {
            DataAtlitsPB::create($item);
        }
    }
}
