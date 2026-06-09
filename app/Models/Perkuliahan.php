<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perkuliahan extends Model
{
    protected $table = 'perkuliahan';

    public $timestamps = false;

    protected $fillable = ['nim', 'nip', 'kode', 'nilai'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nip', 'nip');
    }

    public function mata_kuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode', 'kode');
    }
}
