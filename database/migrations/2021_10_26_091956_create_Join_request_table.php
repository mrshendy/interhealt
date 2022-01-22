<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinRequestTable extends Migration {

	public function up()
	{
		Schema::create('Join_request', function(Blueprint $table) {
			$table->increments('id');
			$table->string('Name');
			$table->string('phone');
			$table->string('email');
			$table->string('user_type_id');
			$table->string('Specialization_id');
			$table->string('Address');
			$table->string('lat');
			$table->string('long');
			$table->integer('Agree_to_the_terms');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('Join_request');
	}
}