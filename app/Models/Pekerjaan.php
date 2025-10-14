<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    //
    protected $fillable = [
        'nama_pekerjaan',
    ];

    protected $casts = [
        'nama_pekerjaan' => 'string',
    ];

    public function setNamaPekerjaanAttribute($value)
    {
        $this->attributes['nama_pekerjaan'] = strtoupper($value);
    }
}
