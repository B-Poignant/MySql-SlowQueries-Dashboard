<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AuthScope;

class Import extends Model
{

    use AuthScope;

    protected $table = 'imports';

    protected $fillable = [
        'status',
        'name',
        'project_id'
    ];

    protected $attributes = [
        'user_id' => null
    ];

    public function importDetail()
    {
        return $this->hasOne('App\ImportDetail');
    }

    public function project()
    {
        return $this->belongsTo('App\Project','project_id');
    }
}
