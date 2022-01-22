<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateTransferTypeTable extends Migration {

	public function up()
	{
		    Schema::create('Transfer_type', function(Blueprint $table) {
			$table->increments('id');
			$table->text('name');
			$table->string('user_add');
			$table->timestamps();
			$table->softDeletes();
		});
	}
	public function down()
	{
		Schema::drop('Transfer_type');
	}
}