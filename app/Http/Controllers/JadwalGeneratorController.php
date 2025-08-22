<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Dosen;
use App\Models\Kelas;

class JadwalGeneratorController extends Controller
{
    public function generate()
    {
        $mataKuliah = MataKuliah::all();
        $dosens     = Dosen::all();
        $kelasList  = Kelas::all();

        if ($mataKuliah->isEmpty() || $dosens->isEmpty() || $kelasList->isEmpty()) {
            return redirect()->back()->with('error', '⚠ Data mata kuliah, dosen, atau kelas masih kosong.');
        }

        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $jamList  = [
            '08:00 - 10:00',
            '10:00 - 12:00',
            '13:00 - 15:00',
            '15:00 - 17:00',
        ];

        $jadwal = [];

        // per hari
        foreach ($hariList as $hari) {
            $jadwal[$hari] = [];

            // per kelas
            foreach ($kelasList as $kelas) {
                $jadwal[$hari][$kelas->nama_kelas] = [];

                // per jam
                foreach ($jamList as $jam) {
                    $mk    = $mataKuliah->random(); // ambil random matkul
                    $dosen = $dosens->random();     // ambil random dosen

                    $jadwal[$hari][$kelas->nama_kelas][] = [
                        'jam'    => $jam,
                        'matkul' => $mk->nama_matakuliah,
                        'dosen'  => $dosen->nama,
                    ];
                }
            }
        }

        return view('jadwal.generate', compact('jadwal'));
    }
}
