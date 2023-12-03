<?php

// CreateClientTable.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->id('id_client');
            $table->string('name', 155);
            $table->string('email', 255);
            $table->string('cpf', 14)->unique();
            $table->string('rg', 10)->unique();
            $table->string('address', 255);
            $table->string('phone', 15);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('client');
    }
}
