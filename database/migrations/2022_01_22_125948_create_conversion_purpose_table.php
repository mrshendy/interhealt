<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateConversionPurposeTable extends Migration {

	public function up()
	{
		Schema::create('conversion_purpose', function(Blueprint $table) {
			$table->increments('id');
			$table->string('Name');
			$table->string('user_add');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('conversion_purpose');
	}
}