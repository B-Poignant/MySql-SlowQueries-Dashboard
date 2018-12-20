<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('nb_queries');
            $table->integer('nb_files');
            $table->decimal('query_time',10,6)->nullable();
            $table->decimal('lock_time',10,6)->nullable();
            $table->integer('rows_sent');
            $table->integer('rows_examined');

            $table->unsignedInteger('import_id')->nullable();
            $table->foreign('import_id')->references('id')->on('imports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('import_details');
    }
}
