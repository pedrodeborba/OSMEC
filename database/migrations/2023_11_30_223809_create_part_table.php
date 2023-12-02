<?php

// CreatePartTable.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartTable extends Migration
{
    public function up()
    {
        Schema::create('part', function (Blueprint $table) {
            $table->id('id_part');
            $table->string('name', 155);
            $table->string('type', 155);
            $table->string('manufacturer', 155);
            $table->string('quantity', 100);
            $table->string('cost', 100);
            $table->string('manufacture_year', 100);
            $table->timestamps();
            $table->unique('id_part');
        });
    }

    public function down()
    {
        Schema::dropIfExists('part');
    }
}