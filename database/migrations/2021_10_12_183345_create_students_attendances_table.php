<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->comment('user_id=student_id');
            $table->date('date');
            $table->string('atnd_status');
            $table->integer('year_id');
            $table->integer('subject_id');
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
        Schema::dropIfExists('students_attendances');
    }
}
