<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->dateTime('visit_datetime');
            $table->string('name');
            $table->string('mobile_no');
            $table->string('institutions'); 
            $table->string('address');
            $table->string('necessity');   
            $table->string('photo');
            $table->text('signature');
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
