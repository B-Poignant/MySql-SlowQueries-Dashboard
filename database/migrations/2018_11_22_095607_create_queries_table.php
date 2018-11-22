<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		/**
		 * raw data from log file
		 */
        Schema::create('queries', function (Blueprint $table) {
		
            $table->increments('id');
			
			$table->string('time')->nullable();
			$table->string('user')->nullable();
			$table->string('host')->nullable();
			$table->string('proccess_id')->nullable();
			$table->decimal('query_time',10,6)->nullable();
			$table->decimal('lock_time',10,6)->nullable();
			$table->integer('rows_sent')->nullable();
			$table->integer('rows_examined')->nullable();
			$table->longText('query')->nullable();
			
	        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queries');
    }
}
