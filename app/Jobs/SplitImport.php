<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;

class SplitImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $import_id;
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
        Log::info('SplitImport : ' . $this->import_id);

        $import = \App\Import::where('id', '=', $this->import_id)->first();

        $extension = '.sql.log';
        $path_pending = 'imports/pending/'.$import->user_id.'/'.$this->import_id.$extension;
        $path_splitted = 'imports/splitted/'.$import->user_id.'/'.$this->import_id.'_';

        $size = Storage::size($path_pending);
        if($size<50000){
            Storage::disk('local')->put($path_splitted.'1'.$extension,Storage::disk('local')->get($path_pending));

            $importFile = new \App\ImportFile;
            $importFile->import_id = $this->import_id;
            $importFile->number = 1;
            $importFile->save();

        }else{
            $handle = Storage::disk('local')->readStream($path_pending);
            var_dump($handle);exit;
        }


        Storage::disk('local')->delete($path_pending);



    }

}
