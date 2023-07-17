<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('program_instructor_id');
            $table->unsignedBigInteger('type_assitance_id');
            $table->timestamps();
            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('program_instructor_id')->references('id')->on('programs_instructors');
            $table->foreign('type_assitance_id')->references('id')->on('types_assistances');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assistances');
    }
}
