@extends('layouts.app') {{-- Tetap pakai layout bawaan --}}

@section('content')
<div class="container" style="margin-top: 20px;">
    <h1 style="font-size: 24px; font-weight: bold;">Daftar Kelas</h1>

    @if(session('success'))
        <div style="margin: 10px 0; padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('kelas.create') }}"
       style="display:inline-block; margin: 15px 0; padding: 8px 16px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">
        + Tambah Kelas
    </a>

    <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
        <thead style="background-color: #343a40; color: white;">
            <tr>
                <th style="padding: 10px; border: 1px solid #ddd;">No</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Nama Kelas</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kelas as $index => $kela)
                <tr style="background-color: #f9f9f9;" onmouseover="this.style.backgroundColor='#f1f1f1'" onmouseout="this.style.backgroundColor='#f9f9f9'">
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $index + 1 }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $kela->nama_kelas }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <a href="{{ route('kelas.edit', $kela->id) }}" style="color: #007bff; text-decoration: none;">Edit</a>
                        |
                        <form action="{{ route('kelas.destroy', $kela->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus kelas ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background: none; color: red; cursor: pointer;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="padding: 10px; text-align: center; color: gray;">Belum ada data kelas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
