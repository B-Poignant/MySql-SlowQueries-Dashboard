<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportDetail extends Model
{
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
}
