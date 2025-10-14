<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeritaDesa extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar'
    ];

    public function getGambarAttribute()
    {
        if (!$this->attributes['gambar']) {
            return null;
        }

        return asset('storage/' . $this->attributes['gambar']);
    }
}
