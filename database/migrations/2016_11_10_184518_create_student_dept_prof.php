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
            
            $table->boolean('6')->default(false);
            $table->string('6_s');

            $table->boolean('7')->default(false);
            $table->string('7_s');
            
            $table->boolean('8')->default(false);
            $table->string('8_s');
            
            $table->boolean('9')->default(false);
            $table->string('9_s');
            
            $table->boolean('10')->default(false);
            $table->string('10_s');

            $table->boolean('11')->default(false);
            $table->string('11_s');

            $table->boolean('12')->default(false);
            $table->string('12_s');
            
            $table->boolean('13')->default(false);
            $table->string('13_s');
            
            $table->boolean('14')->default(false);
            $table->string('14_s');
            
            $table->boolean('15')->default(false);
            $table->string('15_s');

            $table->boolean('16')->default(false);
            $table->string('16_s');

            $table->boolean('17')->default(false);
            $table->string('17_s');
            
            $table->boolean('18')->default(false);
            $table->string('18_s');
            
            $table->boolean('19')->default(false);
            $table->string('19_s');
            
            $table->boolean('20')->default(false);
            $table->string('20_s');

            $table->boolean('21')->default(false);
            $table->string('21_s');

            $table->boolean('22')->default(false);
            $table->string('22_s');
            
            $table->boolean('23')->default(false);
            $table->string('23_s');
            
            $table->boolean('24')->default(false);
            $table->string('24_s');
            
            $table->boolean('25')->default(false);
            $table->string('25_s');

            $table->boolean('26')->default(false);
            $table->string('26_s');

            $table->boolean('27')->default(false);
            $table->string('27_s');
            
            $table->boolean('28')->default(false);
            $table->string('28_s');

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
