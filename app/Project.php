<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AuthScope;

class Project extends Model
{
    use AuthScope;

    protected $table = 'projects';

    protected $fillable = [
        'name',
    ];

}
