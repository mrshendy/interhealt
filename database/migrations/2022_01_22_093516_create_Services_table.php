<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateServicesTable extends Migration {

	public function up()
	{
		Schema::create('Services', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('Name', 200 );
			$table->unsignedInteger('provider_id');
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
			$table->unsignedBigInteger('services_type_id');
            $table->foreign('services_type_id')->references('id')->on('service_type')->onDelete('cascade');
			$table->string('user_add');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('Services');
	}
}