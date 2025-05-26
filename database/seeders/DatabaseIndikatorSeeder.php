<?php

namespace Database\Seeders;

use App\Models\Backend\Indikator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseIndikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Indikator::Create([
            'Poin' => '100',
            'jam' => '03:00',
            'kategori_indikator_id' => '1',
        ]);

          Indikator::Create([
            'Poin' => '50',
            'jam' => '03:30',
            'kategori_indikator_id' => '1',
        ]);

            Indikator::Create([
            'Poin' => '-50',
            'jam' => '04:00',
            'kategori_indikator_id' => '1',
        ]);

          Indikator::Create([
            'Poin' => '100',
            'jam' => '06:30',
            'kategori_indikator_id' => '2',
        ]);

        
          Indikator::Create([
            'Poin' => '50',
            'jam' => '07:00',
            'kategori_indikator_id' => '2',
        ]);

         Indikator::Create([
            'Poin' => '-50',
            'jam' => '07:16',
            'kategori_indikator_id' => '2',
        ]);
    }
}
