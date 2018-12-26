<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoleProject extends Model
{


    protected $table = 'user_role_project';

    protected $attributes = [
        'project_id' => null,
        'user_id' => null,
        'role_id' => null,
    ];
}
