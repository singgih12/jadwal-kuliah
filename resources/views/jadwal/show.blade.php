@extends('layouts.app')

@section('content')
    <h2>Detail Jadwal</h2>

    <p><strong>Hari:</strong> {{ $jadwal->hari }}</p>
    <p><strong>Jam:</strong> {{ $jadwal->jam }}</p>
    <p><strong>Dosen:</strong> {{ $jadwal->dosen->nama }}</p>
    <p><strong>Mata Kuliah:</strong> {{ $jadwal->mataKuliah->nama }}</p>
    <p><strong>Kelas:</strong> {{ $jadwal->kelas->nama }}</p>

    <a href="{{ route('jadwal.index') }}">Kembali ke daftar</a>
@endsection
