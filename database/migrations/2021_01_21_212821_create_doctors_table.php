<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->unsignedBigInteger("user_id");        
            $table->string("name")->nullable();  
            $table->string("speciality")->nullable();  
            $table->string("seniority")->nullable();  
            $table->string("alma_mater")->nullable();  
            $table->timestamp("dob")->nullable();  
            $table->timestamp("graduation_date")->nullable();  
            $table->timestamps();

            $table->primary(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
