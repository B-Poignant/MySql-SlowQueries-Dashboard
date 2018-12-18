<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StoreQueriesImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param integer $import_id
     */
    public function __construct($import_id)
    {
        $this->import_id = $import_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info($this->import_id);


        $import = \App\Import::where('id', '=', $this->import_id)->first();


        $files = File::glob(storage_path() . '/app/imports/splitted/'.$import->user_id.'/'.$this->import_id.'_*');
        foreach ($files as $file){
            $path = str_replace(storage_path() . '/app','',$file);

            $content = Storage::disk('local')->get($path);
            $keywords = preg_split("/# Time:/m", $content,null,PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY);
            foreach($keywords as $keyword){
                if(trim($keyword)!==''){


                    $query = new \App\Query(); //::calculateCompletion('# Time:'.$keyword);
                    $query->seedFormImport('# Time:'.$keyword);
                   $query->import_id = $import->id;
                    $query->user_id = $import->user_id;
                    var_dump($query,$keyword);exit;
                    //$query->save();
                }
            }

        }
    }
}
