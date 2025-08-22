<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    return view('dashboard', [
        'jumlahJadwal' => \App\Models\Jadwal::count(),
        'jumlahKelas' => \App\Models\Kelas::count(),
        'jumlahDosen' => \App\Models\Dosen::count(),
        'jumlahMatkul' => \App\Models\MataKuliah::count(),
    ]);
    
}

}
