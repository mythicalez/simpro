<?php

namespace Database\Seeders;

use App\Models\Bagian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        // Masukkan data sebanyak mungkin
        for ($i = 1; $i <= 10; $i++) {
            DB::table('bagian')->insert([
                'nama' => 'Bagian ' . $i,
            ]);
        }
    }
}
