<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('medicalrecord_id');
            $table->unsignedInteger('section_id');
            $table->unsignedInteger('clinic_id');
            $table->unsignedInteger('doctor_id');
            $table->unsignedInteger('medicine_id');
            $table->string('symptom');
            $table->string('time');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examination');
    }
}
