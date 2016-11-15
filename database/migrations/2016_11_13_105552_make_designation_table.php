<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeDesignationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prof_designation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Prof Name');
            $table->string('Password');

            $table->integer('Prof ID');
            
            $table->string('Designtion');
            $table->string('Field');
            $table->string('href');
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
        Schema::dropIfExists('prof_designation');
    }
}
