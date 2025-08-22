@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Mata Kuliah</h1>

    {{-- Menampilkan error validasi --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Update --}}
    <form action="{{ route('mata_kuliah.update', $matakuliah->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- WAJIB agar laravel tahu ini PUT --}}

        <div>
            <label>Nama Mata Kuliah</label><br>
            <input type="text" name="nama_matakuliah" value="{{ old('nama_matakuliah', $matakuliah->nama_matakuliah) }}" required>
        </div>

        <div>
            <label>Kode</label><br>
            <input type="text" name="kode" value="{{ old('kode', $matakuliah->kode) }}" required>
        </div>

        <div>
            <label>SKS</label><br>
            <input type="number" name="sks" value="{{ old('sks', $matakuliah->sks) }}" required>
        </div>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
