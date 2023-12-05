<?php

// CreatePersonTable
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonTable extends Migration
{
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
            $table->id('id_person');
            $table->string('name', 155);
            $table->string('email', 255);
            $table->string('password', 50);
            $table->string('profile', 45);
            $table->string('cpf', 14);
            $table->string('rg', 10);
            $table->string('phone', 15);
            $table->timestamps();
            $table->unique('id_person');
        });
    }

    public function down()
    {
        Schema::dropIfExists('person');
    }
}
