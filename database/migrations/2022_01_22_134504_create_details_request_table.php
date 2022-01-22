<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateDetailsRequestTable extends Migration {

	public function up()
	{
		Schema::create('details_request', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('id_request');
            $table->foreign('id_request')->references('id')->on('Requests')->onDelete('cascade');
			$table->unsignedInteger('id_Transfer_type');
            $table->foreign('id_Transfer_type')->references('id')->on('Transfer_type')->onDelete('cascade');
			$table->unsignedBigInteger('id_specialty');
            $table->foreign('id_specialty')->references('id')->on('Specialties')->onDelete('cascade');
			$table->unsignedInteger('id_conversion_purpose');
            $table->foreign('id_conversion_purpose')->references('id')->on('conversion_purpose')->onDelete('cascade');
			$table->text('Request_execution_date');
			$table->integer('convert_to_type');
			$table->unsignedBigInteger('Id_country')->nullable();
            $table->foreign('Id_country')->references('id')->on('Countries')->onDelete('cascade');
            $table->unsignedBigInteger('Id_government')->nullable();
            $table->foreign('Id_government')->references('id')->on('Government')->onDelete('cascade');
		    $table->unsignedBigInteger('id_city')->nullable();
            $table->foreign('id_city')->references('id')->on('city')->onDelete('cascade');
			$table->unsignedBigInteger('id_Area')->nullable();
            $table->foreign('id_Area')->references('id')->on('Area')->onDelete('cascade');
			$table->text('id_service_provider_group')->nullable();
			$table->integer('user_add');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('details_request');
	}
}