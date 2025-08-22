@extends('layouts.app')

@section('css')
    <style>
        .table-container {
    overflow-x: auto;
    margin: 20px 0;
}

.table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Segoe UI', sans-serif;
}

.table thead {
    background-color: #1e3a8a; /* biru navy */
    color: white;
    text-align: left;
}

.table th,
.table td {
    padding: 12px 16px;
    border: 1px solid #ddd;
}

.table tbody tr:hover {
    background-color: #f3f4f6;
}

.btn {
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    text-decoration: none;
}

.btn-view {
    background-color: #3b82f6;
    color: white;
}

.btn-edit {
    background-color: #facc15;
    color: black;
}

.btn-delete {
    background-color: #ef4444;
    color: white;
}

.btn:hover {
    opacity: 0.9;
}

    </style>
@endsection

@section('content')
    <h2>Daftar Dosen</h2>
    <a href="{{ route('dosen.create') }}">+ Tambah Dosen</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <div class="table-container">
    <a href="{{ route('dosen.create') }}" class="btn btn-view" style="margin-bottom: 10px; display: inline-block;">
        + Tambah Dosen
    </a>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dosens as $index => $dosen)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $dosen->nama }}</td>
                    <td>{{ $dosen->nip }}</td>
                    <td>{{ $dosen->email }}</td>
                    <td>
                        <a href="{{ route('dosen.show', $dosen->id) }}" class="btn btn-view">Lihat</a>
                        <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
