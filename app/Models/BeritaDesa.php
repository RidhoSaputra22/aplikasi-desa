<?php

namespace App\Models;

use Illuminate\Support\Str;
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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->judul);
        });

        static::updating(function ($model) {
            if ($model->isDirty('judul')) {
                $model->slug = Str::slug($model->judul);
            }
        });
    }
}
