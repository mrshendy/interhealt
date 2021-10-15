<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration {

	public function up()
	{
		Schema::create('providers', function(Blueprint $table) {
			$table->increments('id');
			$table->text('Name');
			$table->text('phone1');
			$table->string('phone2', 13);
			$table->text('email');
			$table->text('address');
            $table->unsignedBigInteger('id_type');
            $table->foreign('id_type')->references('id')->on('User_types')->onDelete('cascade');
            $table->unsignedBigInteger('id_specialty');
            $table->foreign('id_specialty')->references('id')->on('service_type')->onDelete('cascade');
            $table->unsignedBigInteger('id_area');
            $table->foreign('id_area')->references('id')->on('Area')->onDelete('cascade');
			$table->string('User_add', 10);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('providers');
	}
}
