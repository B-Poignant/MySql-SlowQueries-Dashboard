<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class StoreDetailsImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;

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
        Log::info('StoreDetailsImport : ' . $this->import_id);

        $queries = \App\Query::where('import_id', '=', $this->import_id)->get();

        $importDetail = new \App\ImportDetail();
        $importDetail->import_id = $this->import_id;
        $importDetail->nb_files =\App\ImportFile::where('import_id', '=', $this->import_id)->count();



        foreach ($queries as $query){
            Log::info('lock_time : ' . $query->lock_time);

            $importDetail->nb_queries += 1;
            $importDetail->query_time += $query->query_time;
            $importDetail->lock_time += $query->lock_time;
            $importDetail->rows_sent += $query->rows_sent;
            $importDetail->rows_examined += $query->rows_examined;
        }

        Log::info('lock_time : ' . $importDetail->lock_time);

        $importDetail->save();

    }
}
