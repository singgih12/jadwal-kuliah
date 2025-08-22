{{-- resources/views/export/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Halaman Export PDF</h1>

    <a href="{{ route('export.download') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
        Download PDF
    </a>

    <table class="min-w-full bg-white border border-gray-300 rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 border">No</th>
                <th class="py-2 px-4 border">Hari</th>
                <th class="py-2 px-4 border">Jam</th>
                <th class="py-2 px-4 border">Dosen</th>
                <th class="py-2 px-4 border">Mata Kuliah</th>
                <th class="py-2 px-4 border">Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwals as $index => $jadwal)
                <tr class="text-center">
                    <td class="py-2 px-4 border">{{ $index + 1 }}</td>
                    <td class="py-2 px-4 border">{{ $jadwal->hari }}</td>
                    <td class="py-2 px-4 border">{{ $jadwal->jam }}</td>
                    <td class="py-2 px-4 border">{{ $jadwal->dosen->nama }}</td>
                    <td class="py-2 px-4 border">{{ $jadwal->mataKuliah->nama }}</td>
                    <td class="py-2 px-4 border">{{ $jadwal->kelas->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
