<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menggunakan Faker
        $faker = Faker::create();

        // Memasukkan data sebanyak mungkin
        for ($i = 1; $i <= 20; $i++) {
            DB::table('users')->insert([
                'nik' => $faker->unique()->numerify('#######'),
                'username' => $faker->unique()->userName,
                'nama' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'bagian_id' => $faker->numberBetween(1, 5),
            ]);
        }

        User::create([
            'nik' => '5210307',
            'username' => 'ridwanmf',
            'nama' => 'Ridwan Maulana Fadillah',
            'email' => 'ridwanmf21@gmail.com',
            'password' => Hash::make('ridwanmf'),
            'bagian_id' => $faker->numberBetween(1, 5),
        ]);
    }
}
