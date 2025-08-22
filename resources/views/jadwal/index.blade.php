@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-indigo-700">📚 Daftar Jadwal Kuliah</h2>
        <a href="{{ route('jadwal.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
            + Tambah Jadwal
        </a>
    </div>

    <!-- Tombol Export PDF -->
    <div class="mb-4 flex gap-2">
        <a href="{{ route('jadwal.exportPdf', 'Senin' ) }}" 
           class="inline-block bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
            📄 Export PDF
        </a>

        <a href="{{ route('jadwal.generate') }}" 
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Generate Jadwal
        </a>
    </div>

<div class="overflow-x-auto">
    <table class="min-w-full border border-blue-400 bg-white rounded-lg shadow-lg">
        <thead class="bg-blue-600 text-white">
            <tr>
                <th class="px-4 py-3 text-left border-b border-blue-400">No</th>
                <th class="px-4 py-3 text-left border-b border-blue-400">Hari</th>
                <th class="px-4 py-3 text-left border-b border-blue-400">Jam</th>
                <th class="px-4 py-3 text-left border-b border-blue-400">Dosen</th>
                <th class="px-4 py-3 text-left border-b border-blue-400">Mata Kuliah</th>
                <th class="px-4 py-3 text-left border-b border-blue-400">Kelas</th>
                <th class="px-4 py-3 text-left border-b border-blue-400">Aksi</th>
            </tr>
        </thead>
       <tbody>
    @php
        $current_hari = '';
        $rowspan_count = 0;
        $first_row_of_hari = true;
        $index = 0;

        $urutan_hari = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];

        $jadwals = $jadwals->sortBy(function ($item) use ($urutan_hari) {
            $pos = array_search($item->hari, $urutan_hari);
            return $pos === false ? 999 : $pos;
        })->values();
    @endphp

    @forelse ($jadwals as $i => $jadwal)
        @php
            if ($current_hari !== $jadwal->hari) {
                $current_hari = $jadwal->hari;
                $first_row_of_hari = true;
                $rowspan_count = 1;

                for ($j = $i + 1; $j < count($jadwals); $j++) {
                    if ($jadwals[$j]->hari === $current_hari) {
                        $rowspan_count++;
                    } else {
                        break;
                    }
                }
            }
        @endphp

        <tr class="border-b border-blue-200 hover:bg-blue-50 transition">
            <td class="px-4 py-2 text-gray-700">{{ $index + 1 }}</td>

            {{-- tampilkan hari hanya sekali pakai rowspan --}}
            @if ($first_row_of_hari)
                <td class="px-4 py-2 font-medium text-gray-800  align-top" rowspan="{{ $rowspan_count }}">
                    {{ $current_hari }}
                </td>
                @php $first_row_of_hari = false; @endphp
            @endif

            <td class="px-4 py-2 text-gray-700">
                {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
            </td>
            <td class="px-4 py-2 text-gray-700">
                {{ optional($jadwal->dosen)->nama ?? '-' }}
            </td>
            <td class="px-4 py-2 text-gray-700">
                {{ optional($jadwal->mataKuliah)->nama_matakuliah ?? '-' }}
            </td>
            <td class="px-4 py-2 text-gray-700">
                {{ optional($jadwal->kelas)->nama_kelas ?? '-' }}
            </td>
            <td class="px-4 py-2 text-gray-700">
                <div class="flex gap-2">
                    <a href="{{ route('jadwal.show', $jadwal->id) }}" class="text-blue-600 hover:underline">Lihat</a>
                    <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                    <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        @php $index++; @endphp
    @empty
        <tr>
            <td colspan="7" class="text-center py-4 text-gray-500">
                Tidak ada jadwal tersedia.
            </td>
        </tr>
    @endforelse
</tbody>
    </table>
</div>

</div>
@endsection
