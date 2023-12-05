<?php

// CreateMechanicTeamTable.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMechanicTeamTable extends Migration
{
    public function up()
    {
        Schema::create('mechanic_team', function (Blueprint $table) {
            $table->id('id_mechanic_team');
            $table->string('name', 155);
            $table->text('function');
            $table->unsignedBigInteger('mechanic_person_id_person')->constrained('funcionario')->onDelete('cascade');
            $table->timestamps();
            $table->unique('id_mechanic_team');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mechanic_team');
    }
}