<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateFileTypeTable extends Migration {

	public function up()
	{
		Schema::create('file_type', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('user_add');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('file_type');
	}
}