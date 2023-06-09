<?php

namespace Database\Seeders;

use App\Models\Bidang;
use App\Models\Ruangan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        // \App\Models\mahasiswa::factory(5)->create();
        // \App\Models\mahasiswa::factory(5)->create();
    }
}
