<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileManagement extends Model
{
    //

    protected $fillable = [
        'filename',
        'mime_type',
        'size',
        'disk',
        'path',
        'is_public',
        'metadata',
    ];
}