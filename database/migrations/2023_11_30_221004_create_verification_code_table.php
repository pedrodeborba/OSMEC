<?php

// CreateVerificationCodeTable.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationCodeTable extends Migration
{
    public function up()
    {
        Schema::create('verification_code', function (Blueprint $table) {
            $table->integer('code');
            $table->tinyInteger('code_used');
            $table->timestamp('code_time');
            $table->unsignedBigInteger('person_id_person')->constrained('person')->onDelete('cascade');
            $table->primary('person_id_person');
        });
    }

    public function down()
    {
        Schema::dropIfExists('verification_code');
    }
}