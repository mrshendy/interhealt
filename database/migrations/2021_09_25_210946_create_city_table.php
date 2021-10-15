<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityTable extends Migration {

	public function up()
	{
		Schema::create('city', function(Blueprint $table) {
			$table->bigIncrements('id');
            $table->unsignedBigInteger('Id_country');
            $table->foreign('Id_country')->references('id')->on('Countries')->onDelete('cascade');
            $table->unsignedBigInteger('Id_government');
            $table->foreign('Id_government')->references('id')->on('Government')->onDelete('cascade');
	        $table->text('Name');
			$table->text('notes')->nullable();
			$table->string('user_add', 30);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('city');
	}
}
