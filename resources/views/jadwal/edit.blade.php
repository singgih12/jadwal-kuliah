@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow mt-8">
    <h2 class="text-2xl font-bold mb-6">✏️ Edit Jadwal</h2>

    <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Hari -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Hari:</label>
            <input type="text" name="hari" value="{{ $jadwal->hari }}" class="w-full p-2 border rounded">
        </div>

        <!-- Jam Mulai -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Jam Mulai:</label>
            <input type="time" name="jam_mulai" value="{{ $jadwal->jam_mulai }}" class="w-full p-2 border rounded">
        </div>

        <!-- Jam Selesai -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Jam Selesai:</label>
            <input type="time" name="jam_selesai" value="{{ $jadwal->jam_selesai }}" class="w-full p-2 border rounded">
        </div>

        <!-- Dosen -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Dosen:</label>
            <select name="dosen_id" class="w-full p-2 border rounded">
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}" {{ $jadwal->dosen_id == $dosen->id ? 'selected' : '' }}>
                        {{ $dosen->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Mata Kuliah -->
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Mata Kuliah:</label>
            <select name="mata_kuliah_id" class="w-full p-2 border rounded">
                @foreach($mataKuliahs as $mk)
                    <option value="{{ $mk->id }}" {{ $jadwal->mata_kuliah_id == $mk->id ? 'selected' : '' }}>
                        {{ $mk->nama_matakuliah }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Kelas -->
        <div class="mb-6">
            <label class="block mb-1 font-semibold">Kelas:</label>
            <select name="kelas_id" class="w-full p-2 border rounded">
                @foreach($kelas as $kls)
                    <option value="{{ $kls->id }}" {{ $jadwal->kelas_id == $kls->id ? 'selected' : '' }}>
                        {{ $kls->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Submit -->
        <div class="text-right">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
            💾 Update Jadwal
            </button>
        </div>
    </form>
</div>
@endsection
