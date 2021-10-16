<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_sheets', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id')->comment('user_id=teacher_id');
            $table->string('lecture_name')->nullable();
            $table->integer('year_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('course_sheets');
    }
}
