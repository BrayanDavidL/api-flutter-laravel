<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExitPermisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exit_permits', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_time');
            $table->string('state');
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('type_permission_id');
            $table->timestamps();
            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('type_permission_id')->references('id')->on('types_permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exit_permisits');
    }
}
