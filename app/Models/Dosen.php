<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';

    protected $primaryKey = 'nip';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = ['nip', 'nama', 'alamat'];

    public function perkuliahan()
    {
        return $this->hasMany(Perkuliahan::class, 'nip', 'nip');
    }
}
