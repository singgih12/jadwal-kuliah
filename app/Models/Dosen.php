<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosens';

    protected $fillable = [
        'nama',
        'nip',
        'email',
        'alamat',
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}

