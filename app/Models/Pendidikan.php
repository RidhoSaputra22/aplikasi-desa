<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    //
    protected $fillable = [
        'nama_pendidikan',
    ];

    protected $casts = [
        'nama_pendidikan' => 'string',
    ];

    public function setNamaPendidikanAttribute($value)
    {
        $this->attributes['nama_pendidikan'] = strtoupper($value);
    }
}
