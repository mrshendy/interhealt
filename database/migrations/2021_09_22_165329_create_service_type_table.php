<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTypeTable extends Migration {

	public function up()
	{
		Schema::create('service_type', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->text('Name');
			$table->text('notes')->nullable();
			$table->string('user_add', 30);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('service_type');
	}
}
