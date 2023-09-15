<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataAtlitsPB;

class DataAtlitsPBDeleteSeeder extends Seeder
{
    public function run()
    {
        // Hapus semua data dalam tabel "data_atlitPB"
        DataAtlitsPB::truncate();
    }
}
