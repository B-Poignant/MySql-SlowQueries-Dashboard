<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportFile extends Model
{

    protected $table = 'import_files';

    protected $fillable = [
        'status',
        'number'
    ];

    protected $attributes = [
        'import_id' => null,
    ];
}
