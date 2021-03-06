<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateRequestsTable extends Migration {

	public function up()
	{
		Schema::create('Requests', function(Blueprint $table) {
			$table->increments('id');
			$table->string('Patient_name', 250);
			$table->string('date_of_birth', 20);
			$table->string('email', 100);
			$table->string('phone_number', 12);
			$table->string('gender', 2);
			$table->Integer('status');
			$table->string('sender_id', 20);
			$table->text('notes')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('Requests');
	}
}