<?php

namespace Database\Seeders;

use App\Models\Backend\KategoriIndikator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseKategoriIndikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriIndikator::Create([
            'nama' => 'Qiyamulail',
        ]);

         KategoriIndikator::Create([
            'nama' => 'GDS',
        ]);
    }
}
