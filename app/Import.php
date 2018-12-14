<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{

    protected $table = 'imports';

    protected $fillable = [
        'sync'
    ];

    protected $attributes = [
        'user_id' => null,
    ];
}
