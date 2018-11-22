<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
	protected $fillable = [
        'time',
        'user',
        'host',
		'proccess_id',
		'query_time',
		'lock_time',
		'rows_sent',
		'rows_examined',
		'query',
    ];
}
