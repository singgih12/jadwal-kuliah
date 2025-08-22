<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class JadwalController extends Controller
{
    // Tampilkan semua jadwal
    public function index()
{
    $urutan_hari = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];

    $jadwals = Jadwal::with(['dosen', 'mataKuliah', 'kelas'])
        ->get()
        ->sortBy(function ($item) use ($urutan_hari) {
            $pos = array_search($item->hari, $urutan_hari);
            return sprintf('%02d-%s', $pos === false ? 999 : $pos, $item->jam_mulai);
        })
        ->values();

    return view('jadwal.index', compact('jadwals'));
}


    // Tampilkan form tambah jadwal
    public function create()
    {
        $dosens = Dosen::all();
        $mataKuliahs = MataKuliah::all();
        $kelass = Kelas::all();

        return view('jadwal.create', compact('dosens', 'mataKuliahs', 'kelass'));
    }

    // Simpan jadwal baru
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'dosen_id' => 'required|exists:dosens,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    // Tampilkan detail satu jadwal
    public function show($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('jadwal.show', compact('jadwal'));
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $dosens = Dosen::all();
        $mataKuliahs = MataKuliah::all();
        $kelas = Kelas::all();

        return view('jadwal.edit', compact('jadwal', 'dosens', 'mataKuliahs', 'kelas'));
    }

    // Update data jadwal
    public function update(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'dosen_id' => 'required|exists:dosens,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    // Export jadwal ke PDF
    public function exportPdf($hari)
{

    $mataKuliah = MataKuliah::all();
    $dosens     = Dosen::all();
    $kelasList  = Kelas::all();

    if ($mataKuliah->isEmpty() || $dosens->isEmpty() || $kelasList->isEmpty()) {
        return redirect()->back()->with('error', '⚠ Data mata kuliah, dosen, atau kelas masih kosong.');
    }

    // Daftar hari valid
    $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
    $jamList  = [
        '08:00 - 10:00',
        '10:00 - 12:00',
        '13:00 - 15:00',
        '15:00 - 17:00',
    ];

    // Validasi input hari
    if (!in_array($hari, $hariList)) {
        return redirect()->back()->with('error', '⚠ Hari tidak valid.');
    }

    // Generate jadwal hanya untuk hari yang dipilih
    $jadwal = [
        $hari => []
    ];

    foreach ($kelasList as $kelas) {
        $jadwal[$hari][$kelas->nama_kelas] = [];

        foreach ($jamList as $jam) {
            $mk    = $mataKuliah->random();
            $dosen = $dosens->random();

            $jadwal[$hari][$kelas->nama_kelas][] = [
                'jam'    => $jam,
                'matkul' => $mk->nama_matakuliah,
                'dosen'  => $dosen->nama,
            ];
        }
    }


    // Load view PDF khusus hari yang dipilih
    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('jadwal.pdf', compact('jadwal', 'hari'))
        ->setPaper('a4', 'landscape');

        return $pdf->download('jadwal_kuliah.pdf');
    }

    // Hapus jadwal
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
