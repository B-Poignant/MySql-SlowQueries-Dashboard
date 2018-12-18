<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $table = 'queries';

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
    protected $attributes = [
        'import_id' => null,
        'user_id' => null,
    ];

    public function seedFormImport($raw_content)
    {

        $keywords = preg_split("/\n/m", $raw_content,null,PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY);

        $this->time = $keywords[0];
       // var_dump(     $keywords);exit;

        return $this;
    }

}
