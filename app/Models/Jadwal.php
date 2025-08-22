<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'hari',
        'jam_mulai',
        'jam_selesai',
        'dosen_id',
        'mata_kuliah_id',
        'kelas_id',
    ];

    public function mataKuliah()
{
    return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
}

public function kelas()
{
    return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
}

public function dosen()
{
    return $this->belongsTo(Dosen::class, 'dosen_id', 'id');
}

}
