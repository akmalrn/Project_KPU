<?php

namespace Database\Seeders;

use App\Models\Backend\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::Create([
            'id' => '12200765',
            'nama' => 'Sandy TWS',
            'kelas' => 'XII TJKT',
            'tipe' => 'reguler',
            'password' => Hash::make('123')
        ]);

        Siswa::Create([
            'id' => '12200766',
            'nama' => 'Rizen',
            'kelas' => 'XII PPLG',
            'tipe' => 'reguler',
            'password' => Hash::make('123')
        ]);

        Siswa::Create([
            'id' => '12200767',
            'nama' => 'Putih Bolos',
            'kelas' => 'XII TJKT',
            'tipe' => 'reguler',
            'password' => Hash::make('123')
        ]);

          Siswa::Create([
            'id' => '12200768',
            'nama' => 'Akmal RN',
            'kelas' => 'XII PPLG',
            'tipe' => 'unggulan',
            'password' => Hash::make('123')
        ]);

          Siswa::Create([
            'id' => '12200769',
            'nama' => 'Makmal',
            'kelas' => 'XII PPLG',
            'tipe' => 'unggulan',
            'password' => Hash::make('123')
        ]);

          Siswa::Create([
            'id' => '12200770',
            'nama' => 'Amri',
            'kelas' => 'XII PPLG',
            'tipe' => 'unggulan',
            'password' => Hash::make('123')
        ]);
    }
}
