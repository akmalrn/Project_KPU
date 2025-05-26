<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Siswa;
use PDF;

class SiswaDashboardController extends Controller
{
    public function index()
    {

        $allSiswa = Siswa::with('prestasi')->get()->map(function ($item) {
            $item->total_poin = $item->prestasi->sum('poin');
            return $item;
        })->sortByDesc('total_poin')->values();

        // Ambil siswa yang login
        $siswa = Auth::guard('siswa')->user();
        $siswa->total_poin = $siswa->prestasi->sum('poin');

        // Scoreboard: 3 siswa teratas
        $scoreboard = $allSiswa->take(3);

        // Posisi siswa login
        $posisi = $allSiswa->search(function ($item) use ($siswa) {
            return $item->id == $siswa->id;
        }) + 1;

        return view('frontend.index', [
            'siswa' => [$siswa],
            'scoreboard' => $scoreboard,
            'posisi' => $posisi
        ]);
    }
    public function downloadPdf()
{
    $siswa = Auth::guard('siswa')->user();
    $prestasis = $siswa->prestasi;

    $pdf = \PDF::loadView('backend.prestasi.pdf', [
        'siswa' => $siswa,
        'prestasis' => $prestasis
    ]);
    return $pdf->download('prestasi_'.$siswa->id.'.pdf');
}

}
