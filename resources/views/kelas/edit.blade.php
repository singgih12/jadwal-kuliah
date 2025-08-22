@extends('layouts.app') {{-- Ganti jika layout utama kamu berbeda --}}

@section('content')
<div class="container">
    <h1>Edit Kelas</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kelas.update', $kela->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 10px;">
            <label for="nama_kelas">Nama Kelas</label><br>
            <input type="text" name="nama_kelas" id="nama_kelas" value="{{ old('nama_kelas', $kela->nama_kelas) }}" required>
        </div>

        <button type="submit" style="padding: 6px 12px; background-color: #ffc107; color: white; border: none;">Update</button>
        <a href="{{ route('kelas.index') }}" style="margin-left: 10px;">Batal</a>
    </form>
</div>
@endsection
