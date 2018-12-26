<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    /**
     * @var array
     */
    protected $fillable = [
        'name', //['owner', 'administrator', 'user', 'viewer']
    ];
}