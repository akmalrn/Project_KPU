<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi';

    protected $fillable = [
        'siswa_id',
        'tanggal',
        'poin',
        'jam',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }


    public function kategoriIndikator()
    {
        return $this->belongsTo(KategoriIndikator::class);
    }
}
