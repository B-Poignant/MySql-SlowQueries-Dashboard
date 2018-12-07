<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeysUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('imports', function (Blueprint $table) {
		    $table->unsignedInteger('user_id');
		
		    $table->foreign('user_id')->references('id')->on('users');
	    });
	
	    Schema::table('queries', function (Blueprint $table) {
		    $table->unsignedInteger('user_id');
		
		    $table->foreign('user_id')->references('id')->on('users');

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
	    Schema::table('imports', function (Blueprint $table) {
		    $table->dropForeign(['user_id']);
	    });
	
	    Schema::table('queries', function (Blueprint $table) {
		    $table->dropForeign(['user_id','import_id']);
	    });
    }
}
