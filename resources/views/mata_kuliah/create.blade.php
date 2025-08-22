@extends('layouts.app')


@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tambah Mata Kuliah</h5>
                </div>

                <div class="card-body">
                    {{-- Tampilkan Error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Terjadi Kesalahan!</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('mata_kuliah.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_matakuliah" class="form-label">Nama Mata Kuliah</label>
                            <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah" value="{{ old('nama_matakuliah') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="{{ old('kode') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="sks" class="form-label">SKS</label>
                            <input type="number" class="form-control" id="sks" name="sks" value="{{ old('sks') }}" required min="1">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('mata_kuliah.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
