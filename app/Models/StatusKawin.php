<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusKawin extends Model
{
    //
    protected $fillable = [
        'nama_status',
    ];

    protected $casts = [
        'nama_status' => 'string',
    ];

    public function setNamaStatusAttribute($value)
    {
        $this->attributes['nama_status'] = strtoupper($value);
    }
}
