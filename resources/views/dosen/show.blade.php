@extends('layouts.app')

@section('content')
    <h2>Detail Dosen</h2>

    <p><strong>Nama:</strong> {{ $dosen->nama }}</p>
    <p><strong>NIP:</strong> {{ $dosen->nip }}</p>
    <p><strong>Email:</strong> {{ $dosen->email }}</p>

    <a href="{{ route('dosen.index') }}">Kembali ke daftar</a>
@endsection
