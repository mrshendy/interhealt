<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateProviderCategoryTable extends Migration {

	public function up()
	{
		Schema::create('Provider_Category', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->text('Name');
            $table->text('notes')->nullable();
			$table->string('User_add', 15);
            $table->unsignedBigInteger('id_type');
            $table->foreign('id_type')->references('id')->on('User_types')->onDelete('cascade');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('Provider_Category');
	}
}
