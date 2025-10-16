<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class ParawisataDesa extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'alamat',
        'deskripsi',
        'gambar',
        'galeri',
        'lat',
        'long'

    ];

    protected $casts = [
        'galeri' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);
        });

        static::updating(function ($model) {
            if ($model->isDirty('title')) {
                $model->slug = Str::slug($model->title);
            }
        });
    }
}
