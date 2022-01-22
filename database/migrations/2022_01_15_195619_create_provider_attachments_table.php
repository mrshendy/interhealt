<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderAttachmentsTable extends Migration {

	public function up()
	{
		Schema::create('provider_attachments', function(Blueprint $table) {
			$table->id();
			$table->string('path', 100);
			$table->string('Name_file', 100);
			$table->unsignedInteger('id_provider');
            $table->foreign('id_provider')->references('id')->on('providers')->onDelete('cascade');
			$table->integer('id_type_file');
			$table->string('Id_from_action', 20);
			$table->string('user_add', 50);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('provider_attachments');
	}
}