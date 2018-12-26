<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //correspond au ID figé dans le seeder
    const ROLE_OWNER = 1;
    const ROLE_ADMINISTRATOR = 2;
    const ROLE_USER = 3;
    const ROLE_VIEWER = 4;

    protected $table = 'roles';

    /**
     * @var array
     */
    protected $fillable = [
        'name', //['owner', 'administrator', 'user', 'viewer']
    ];
}
