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
        Log::info('StoreQueriesImport : ' . $this->import_id);

        $import = \App\Import::where('id', '=', $this->import_id)->first();
        $importFiles = \App\ImportFile::where('import_id', '=', $this->import_id)->get();

        $files = File::glob(storage_path() . '/app/imports/splitted/' . $import->user_id . '/' . $this->import_id . '_*');

        if(count($files)!=count($importFiles)){
            //handle error
        }


        foreach ($importFiles as $importFile) {

            $path = 'imports/splitted/' . $import->user_id . '/' . $this->import_id . '_'.$importFile->number.'.sql.log';

            $content = Storage::disk('local')->get($path);

            $keywords = preg_split("/# Time:/m", $content, null, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
            foreach ($keywords as $keyword) {
                if (trim($keyword) !== '') {
                    $query = new \App\Query();
                    $query->hydrateFormImport('# Time:' . $keyword);
                    $query->import_id = $import->id;
                    $query->user_id = $import->user_id;
                    $query->save();
                }
            }

            $importFile->status='done';
            $importFile->save();

            Storage::disk('local')->delete($path);
        }

        $import->status = 'done';
        $import->save();
    }
}
