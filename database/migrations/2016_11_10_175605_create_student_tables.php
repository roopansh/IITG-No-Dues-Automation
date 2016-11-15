 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {

            $table->string('Student Name');
            $table->integer('Roll No');

            $table->primary('Roll No');
            $table->string('Hostel');
            $table->string('Password');
            $table->string('Department');
            
            $table->boolean('Thesis')->default(false);
            $table->string('Thesis Comments');
            
            $table->boolean('Care Taker')->default(false);
            $table->string('Care Taker Comments');

            $table->boolean('Warden')->default(false);
            $table->string('Warden Comments');
            
            $table->boolean('Library')->default(false);
            $table->string('Library Comments');

            $table->boolean('Gymkhana')->default(false);
            $table->string('Gymkhana Comments');

            $table->boolean('Head Department')->default(false);
            $table->string('Head Department Comments');

            $table->boolean('CC')->default(false);
            $table->string('CC Comments');

            $table->boolean('Mech Workshop')->default(false);
            $table->string('Mech Workshop Comments');

            $table->boolean('Asst Registrar SA')->default(false);
            $table->string('Asst Registrar SA Comments');

            $table->boolean('Asst Registrar Finance')->default(false);
            $table->string('Asst Registrar Finance Comments');

            
            

            
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
        Schema::dropIfExists('student');
    }
}
