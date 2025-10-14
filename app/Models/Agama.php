<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    //
    protected $fillable = [
        'nama_agama',
    ];

    protected $casts = [
        'nama_agama' => 'string',
    ];

    public function setNamaAgamaAttribute($value)
    {
        $this->attributes['nama_agama'] = strtoupper($value);
    }
}
