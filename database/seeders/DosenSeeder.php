<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Dosen::create(['nama' => 'Pak Budi']);
        Dosen::create(['nama' => 'Bu Sari']);
    }
}
