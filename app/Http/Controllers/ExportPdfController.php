<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use PDF;

class ExportPdfController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with(['dosen', 'mataKuliah', 'kelas'])->get();
        return view('export.index', compact('jadwals'));
    }

    public function download()
    {
        $jadwals = Jadwal::with(['dosen', 'mataKuliah', 'kelas'])->get();
          $pdf = PDF::loadView('export.pdf', compact('jadwals'))
              ->setPaper('A4', 'landscape'); // optional: landscape
        return $pdf->download('jadwal-kuliah.pdf');
    }
}
