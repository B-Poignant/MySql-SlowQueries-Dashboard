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

    /**
     * Get the user that owns the phone.
     */
    public function importDetail()
    {
        return $this->belongsTo('App\ImportDetail', 'id');
    }
}
