<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DataAtlit;

class AtlitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
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
            DataAtlit::create($item);
        }
    }
}
