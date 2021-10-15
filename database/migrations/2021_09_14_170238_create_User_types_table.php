<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateUserTypesTable extends Migration {

	public function up()
	{
		Schema::create('User_types', function(Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('type_name');
			$table->text('notes')->nullable();
			$table->string('user_add');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('User_types');
	}
}
