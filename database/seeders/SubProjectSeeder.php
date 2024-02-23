<?php

namespace Database\Seeders;

use App\Models\SubProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubProject::create([
            'project_id' => 1,
            'kode_project' => '89A',
            'nama_subproject' => 'PRODUKSI',
            'kode_angka' => 89,
            'kode_huruf' => 'A',
            'prioritas' => 1
        ]);
        SubProject::create([
            'project_id' => 1,
            'kode_project' => '89B',
            'nama_subproject' => 'MILL TOWER',
            'kode_angka' => 89,
            'kode_huruf' => 'B',
            'prioritas' => 2
        ]);
        SubProject::create([
            'project_id' => 1,
            'kode_project' => '89C',
            'nama_subproject' => 'FEEDING MILL',
            'kode_angka' => 89,
            'kode_huruf' => 'C',
            'prioritas' => 3
        ]);
        SubProject::create([
            'project_id' => 2,
            'kode_project' => '102',
            'nama_subproject' => 'PRODUKSI',
            'kode_angka' => 102,
            'prioritas' => 1
        ]);
        SubProject::create([
            'project_id' => 2,
            'kode_project' => '102A',
            'nama_subproject' => 'NEW PRODUKSI',
            'kode_angka' => 102,
            'kode_huruf' => 'A',
            'prioritas' => 2
        ]);
    }
}
