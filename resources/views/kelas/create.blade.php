@extends('layouts.app') {{-- Ganti jika menggunakan layout lain --}}

@section('content')
<div class="container">
    <h1>Tambah Kelas</h1>
    <p>Silakan isi form berikut untuk menambahkan kelas baru.</p>

    {{-- Tampilkan pesan sukses jika ada --}}   

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 10px;">
            <label for="nama_kelas">Nama Kelas</label><br>
            <input type="text" name="nama_kelas" id="nama_kelas" value="{{ old('nama_kelas') }}" required>
        </div>

        <button type="submit" style="padding: 6px 12px; background-color: #28a745; color: white; border: none;">Simpan</button>
        <a href="{{ route('kelas.index') }}" style="margin-left: 10px;">Kembali</a>
    </form>
</div>
@endsection
