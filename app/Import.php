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
        'name'
    ];

    protected $attributes = [
        'user_id' => null,
    ];

    public function importDetail()
    {
        return $this->hasOne('App\ImportDetail');
    }
}
