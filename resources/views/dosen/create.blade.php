@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-indigo-100 to-blue-200">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Tambah Dosen</h2>

        <form action="{{ route('dosen.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="nama" class="block text-gray-700 font-semibold">Nama</label>
                <input type="text" name="nama" id="nama" required
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>

            <div>
                <label for="nip" class="block text-gray-700 font-semibold">NIP</label>
                <input type="text" name="nip" id="nip" required
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" name="email" id="email" required
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>

            <div class="flex justify-center">
                <button type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition duration-200">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
