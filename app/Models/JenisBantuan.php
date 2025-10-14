<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisBantuan extends Model
{
    //
    protected $fillable = [
        'nama_bantuan',
    ];

    protected $casts = [
        'nama_bantuan' => 'string',
    ];

    public function setNamaBantuanAttribute($value)
    {
        $this->attributes['nama_bantuan'] = strtoupper($value);
    }
}
