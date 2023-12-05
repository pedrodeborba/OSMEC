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
            $table->text('description');
            $table->string('manufacturer', 155);
            $table->integer('quantity');
            $table->float('cost');
            $table->integer('manufacture_year');
            $table->timestamps();
            $table->unique('id_part');
        });
    }

    public function down()
    {
        Schema::dropIfExists('part');
    }
}