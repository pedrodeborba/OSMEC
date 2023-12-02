<?php

// CreateAdminTable.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->unsignedBigInteger('person_id_person')->constrained('person')->onDelete('cascade');
            $table->primary('person_id_person');
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin');
    }
}