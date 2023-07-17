<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisrespectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disrespects', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->dateTime('date_time');
            $table->string('state');
            $table->unsignedBigInteger('type_desrespect_id');
            $table->unsignedBigInteger('person_id');
            $table->timestamps();
            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('type_desrespect_id')->references('id')->on('types_disrespects');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disrespects');
    }
}
