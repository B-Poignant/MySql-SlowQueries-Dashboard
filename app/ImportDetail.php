<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportDetail extends Model
{

    public $timestamps = false;

    protected $table = 'import_details';

    protected $fillable = [
        'nb_queries',
        'nb_files',
        'query_time',
        'lock_time',
        'rows_sent',
        'rows_examined'
    ];

    protected $attributes = [
        'import_id' => null,
    ];

    public function import()
    {
        return $this->belongsTo('App\Import');
    }
}
