<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Project::create([
            'nama_project' => 'SINTA PRIMA FEEDMILL',
            'tahun' => 2023,
        ]);
        Project::create([
            'nama_project' => 'SANTOS PREMIUM KRIMER 3A',
            'tahun' => 2023,
        ]);
        Project::create([
            'nama_project' => 'MULTI CITRA RASA',
            'tahun' => 2023,
        ]);
    }
}
