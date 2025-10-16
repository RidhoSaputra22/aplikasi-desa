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
        'long',
        'link_maps',
    ];

    protected $casts = [
        'galeri' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);

            if ($model->link_maps) {
                $longLat = $model->getLongLatUsingMaps($model->link_maps);
                // dd($longLat);
                if ($longLat) {
                    $model->lat = $longLat['lat'];
                    $model->long = $longLat['long'];
                }
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('title')) {
                $model->slug = Str::slug($model->title);
            }

            if ($model->isDirty('link_maps') && $model->link_maps) {
                $longLat = $model->getLongLatUsingMaps($model->link_maps);
                if ($longLat) {
                    $model->lat = $longLat['lat'];
                    $model->long = $longLat['long'];
                }
            }
        });
    }

    private function getLongLatUsingMaps($linkMaps)
    {
        // Contoh link: https://www.google.com/maps/place/...
        $pattern = '/@([-+]?[0-9]*\.?[0-9]+),\s*([-+]?[0-9]*\.?[0-9]+)/';
        preg_match($pattern, $linkMaps, $matches);

        if (count($matches) === 3) {
            return [
                'lat' => $matches[1],
                'long' => $matches[2],
            ];
        }

        return null;
    }
}
