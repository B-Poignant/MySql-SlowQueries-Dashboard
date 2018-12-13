<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $fillable = [
        'size',
        'path',
        'sync'
    ];

    protected $attributes = [
        'user_id' => null,
    ];
}
