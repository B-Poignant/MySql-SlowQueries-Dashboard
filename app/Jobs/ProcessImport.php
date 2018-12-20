<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class ProcessImport implements ShouldQueue
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
        Log::info('ProcessImport : ' . $this->import_id);

        $import = \App\Import::where('id', '=', $this->import_id)->first();
        $import->status = 'processing';
        $import->save();
    }
}
