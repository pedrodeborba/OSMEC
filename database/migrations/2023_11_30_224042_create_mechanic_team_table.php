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
            $table->id();
            $table->string('name', 155);
            $table->text('function');
            $table->string('mechanics', 255);
            $table->unsignedBigInteger('mechanic_person_id_person')->constrained('mechanic')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mechanic_team');
    }
}