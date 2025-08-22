@extends('layouts.app')

@section('content')
    <h2>Edit Dosen</h2>

    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama:</label>
        <input type="text" name="nama" value="{{ $dosen->nama }}" required><br>

        <label>NIP:</label>
        <input type="text" name="nip" value="{{ $dosen->nip }}" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $dosen->email }}" required><br>

        <button type="submit">Update</button>
    </form>
@endsection
