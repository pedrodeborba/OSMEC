<?php

// CreateMechanicTable.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMechanicTable extends Migration
{
    public function up()
    {
        Schema::create('mechanic', function (Blueprint $table) {
            $table->unsignedBigInteger('person_id_person');
            $table->foreign('person_id_person')->references('id_person')->on('person')->onDelete('cascade');
            $table->tinyInteger('status');
            $table->string('specialty', 100);
            $table->primary('person_id_person');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mechanic');
    }
}
