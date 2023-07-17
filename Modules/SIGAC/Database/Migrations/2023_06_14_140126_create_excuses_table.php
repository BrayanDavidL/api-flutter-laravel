<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excuses', function (Blueprint $table) {
            $table->id();
            $table->string('state');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('description');
            $table->binary('evidence');
            $table->unsignedBigInteger('type_excuses_id');
            $table->unsignedBigInteger('person_id');
            $table->timestamps();
            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('type_excuses_id')->references('id')->on('types_excuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excuses');
    }
}
