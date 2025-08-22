@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px; margin: 30px auto; font-family: 'Segoe UI', sans-serif;">

    <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Daftar Mata Kuliah</h1>

    {{-- Flash message --}}
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol Tambah --}}
    <a href="{{ route('mata_kuliah.create') }}"
       style="margin-bottom: 20px; display: inline-block; background-color: #007bff; color: white; padding: 10px 16px; border-radius: 5px; text-decoration: none;">
        + Tambah Mata Kuliah
    </a>

    {{-- Tabel Mata Kuliah --}}
   <table cellpadding="10" cellspacing="0" width="100%"
       style="border-collapse: collapse; font-size: 14px;">
    <thead style="background-color: #343a40; color: white;">
        <tr>
            <th style="padding: 10px; border: 1px solid #dee2e6;">No</th>
            <th style="padding: 10px; border: 1px solid #dee2e6;">Kode</th>
            <th style="padding: 10px; border: 1px solid #dee2e6;">Nama Mata Kuliah</th>
            <th style="padding: 10px; border: 1px solid #dee2e6;">SKS</th>
            <th style="padding: 10px; border: 1px solid #dee2e6;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mataKuliahs as $index => $matkul)
            <tr style="background-color: {{ $index % 2 == 0 ? '#f8f9fa' : '#ffffff' }};">
                <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $index + 1 }}</td>
                <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $matkul->kode }}</td>
                <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $matkul->nama_matakuliah }}</td>
                <td style="padding: 10px; border: 1px solid #dee2e6;">{{ $matkul->sks }}</td>
                <td style="padding: 10px; border: 1px solid #dee2e6;">
                    <a href="{{ route('mata_kuliah.show', $matkul->id) }}" style="color: blue;">Lihat</a> |
                    <a href="{{ route('mata_kuliah.edit', $matkul->id) }}" style="color: orange;">Edit</a> |
                    <form action="{{ route('mata_kuliah.destroy', $matkul->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" style="color:red; background:none; border:none; padding:0; cursor:pointer;">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

        @if($mataKuliahs->isEmpty())
            <tr>
                <td colspan="5" style="padding: 15px; text-align: center; background-color: #f8d7da; color: #721c24;">
                    Tidak ada data mata kuliah.
                </td>
            </tr>
        @endif
    </tbody>
</table>

</div>
@endsection
