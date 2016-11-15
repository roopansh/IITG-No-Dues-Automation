<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentDeptProf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_dept_prof', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department');
            $table->string('Student Name');
            
            $table->integer('Roll No');

            $table->boolean('1')->default(false);
            $table->string('1_s');

            $table->boolean('2')->default(false);
            $table->string('2_s');
            
            $table->boolean('3')->default(false);
            $table->string('3_s');
            
            $table->boolean('4')->default(false);
            $table->string('4_s');
            
            $table->boolean('5')->default(false);
            $table->string('5_s');
            
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
        Schema::dropIfExists('student_dept_prof');
    }
}
