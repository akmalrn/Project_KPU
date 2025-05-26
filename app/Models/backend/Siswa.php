<?php

namespace App\Models\Backend;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{

    use Notifiable;

    protected $table = 'siswa';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama',
        'kelas',
        'tipe',
        'password',
    ];

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }
    public function kategoriIndikator()
    {
        return $this->belongsTo(KategoriIndikator::class);
    }
}
