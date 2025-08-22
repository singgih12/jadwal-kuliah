@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold mb-6 text-center text-blue-600">Tambah Jadwal Baru</h2>'
    
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jadwal.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
    <label class="block mb-1 font-medium text-gray-700">Hari</label>
    <select name="hari" required
            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        <option value="">-- Pilih Hari --</option>
        <option value="Senin">Senin</option>
        <option value="Selasa">Selasa</option>
        <option value="Rabu">Rabu</option>
        <option value="Kamis">Kamis</option>
        <option value="Jumat">Jumat</option>
        <option value="Sabtu">Sabtu</option>
        <option value="Minggu">Minggu</option>
    </select>
</div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">Jam Mulai</label>
            <input type="time" name="jam_mulai" required
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">Jam Selesai</label>
            <input type="time" name="jam_selesai" required
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">Dosen</label>
            <select name="dosen_id" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring focus:ring-blue-200">
                <option value="">-- Pilih Dosen --</option>
                @foreach($dosens as $dosen)
                    <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">Mata Kuliah</label>
            <select name="mata_kuliah_id" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring focus:ring-blue-200">
                <option value="">-- Pilih Mata Kuliah --</option>
                @foreach($mataKuliahs as $mk)
                    <option value="{{ $mk->id }}">{{ $mk->nama_matakuliah }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">Kelas</label>
            <select name="kelas_id" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring focus:ring-blue-200">
                <option value="">-- Pilih Kelas --</option>
                @foreach($kelass as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
        </div>

        <div class="text-center">
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
