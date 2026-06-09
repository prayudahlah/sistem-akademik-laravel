<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';

    protected $primaryKey = 'kode';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = ['kode', 'matkul', 'sks', 'smt'];

    public function perkuliahan()
    {
        return $this->hasMany(Perkuliahan::class, 'kode', 'kode');
    }
}
