<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('department_id');
            $table->integer('subject_id');
            $table->integer('full_mark');
            $table->integer('pass_mark');
            $table->integer('subjective_mark');
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
        Schema::dropIfExists('assign_subjects');
    }
}
