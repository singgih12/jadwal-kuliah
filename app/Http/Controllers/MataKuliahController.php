<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mataKuliahs = MataKuliah::all();
        return view('mata_kuliah.index', compact('mataKuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
        
    public function store(Request $request)
    {
        $request->validate([
            'nama_matakuliah' => 'required|string|max:255',
            'kode' => 'required|unique:mata_kuliahs,kode',
            'sks' => 'required|integer|min:1',
        ]);;

        MataKuliah::create($request->all());

        return redirect()->route('mata_kuliah.index')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function create()
    {
        return view('mata_kuliah.create');
    }
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataKuliah $mata_kuliah) {
    return view('mata_kuliah.edit', ['matakuliah' => $mata_kuliah]);
}

public function update(Request $request, MataKuliah $mata_kuliah) {
    $mata_kuliah->update($request->all());
    return redirect()->route('mata_kuliah.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataKuliah $matakuliah)
    {
        $matakuliah->delete();
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
