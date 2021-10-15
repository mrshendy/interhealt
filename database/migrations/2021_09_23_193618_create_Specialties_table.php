
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Specialties', function (Blueprint $table) {
            $table->id();
            $table->text('Name');
            $table->text('notes')->nullable();
            $table->text('user_add');
            $table->unsignedBigInteger('Servicetype_id');
            $table->foreign('Servicetype_id')->references('id')->on('service_type')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Specialties');
    }
}
