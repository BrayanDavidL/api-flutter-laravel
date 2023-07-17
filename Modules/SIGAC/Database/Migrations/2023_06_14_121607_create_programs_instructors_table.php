<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs_instructors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('enviroment_id');
            $table->date('date');
            $table->time('start_date');
            $table->time('end_date');
            $table->timestamps();
            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('enviroment_id')->references('id')->on('environments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs_instructors');
    }
}
