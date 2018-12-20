<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\AuthScope;

class Query extends Model
{
    use AuthScope;

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

    public function hydrateFormImport($raw_content)
    {

        $keywords = preg_split("/\n/m", $raw_content,null,PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY);

        $this->_hydrateTimeFromKeywords($keywords[0]);
        $this->_hydrateUserFromKeywords($keywords[1]);
        $this->_hydrateHostFromKeywords($keywords[1]);
        $this->_hydrateProcessIdFromKeywords($keywords[1]);
        $this->_hydrateQueryTimeFromKeywords($keywords[2]);
        $this->_hydrateLockTimeFromKeywords($keywords[2]);
        $this->_hydrateRowsSentFromKeywords($keywords[2]);
        $this->_hydrateRowsExaminedFromKeywords($keywords[2]);
        $this->_hydrateQueryFromKeywords(implode(array_slice($keywords,3)));

        return $this;
    }

    /**
     * @param $keyword
     */
    private function _hydrateTimeFromKeywords($keyword){
        $this->time = str_replace('# Time: ','',$keyword);
    }

    private function _hydrateUserFromKeywords($keyword){
        $re = '/(\[.{0,}\])/U';
        preg_match($re, $keyword, $matches, null, 0);

        $this->user = str_replace(['[',']'],'',$matches[0]);
    }
    private function _hydrateHostFromKeywords($keyword){
        $re = '/@  (\[.{0,}\])/';
        preg_match($re, $keyword, $matches, null, 0);
        $this->host = str_replace(['[',']'],'',$matches[1]);
    }
    private function _hydrateProcessIdFromKeywords($keyword){
        $re = '/Id: ([0-9]{0,})/';
        preg_match($re, $keyword, $matches, null, 0);

        $this->proccess_id = str_replace('# Time: ','',$matches[1]);
    }
    private function _hydrateQueryTimeFromKeywords($keyword){
        $re = '/Query_time: ([0-9.]{0,})/';
        preg_match($re, $keyword, $matches, null, 0);

        $this->query_time = str_replace('# Time: ','',$matches[1]);
    }
    private function _hydrateLockTimeFromKeywords($keyword){
        $re = '/Lock_time: ([0-9.]{0,})/';
        preg_match($re, $keyword, $matches, null, 0);

        $this->lock_time = str_replace('# Time: ','',$matches[1]);
    }
    private function _hydrateRowsSentFromKeywords($keyword){
        $re = '/Rows_sent: ([0-9.]{0,})/';
        preg_match($re, $keyword, $matches, null, 0);

        $this->rows_sent = str_replace('# Time: ','',$matches[1]);
    }
    private function _hydrateRowsExaminedFromKeywords($keyword){
        $re = '/Rows_examined: ([0-9.]{0,})/';
        preg_match($re, $keyword, $matches, null, 0);

        $this->rows_examined = str_replace('# Time: ','',$matches[1]);
    }
    private function _hydrateQueryFromKeywords($keyword){

        $this->query = str_replace('# Time: ','',$keyword);
    }
}
