<?php

// CreateVehicleTable.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id('id_vehicle');
            $table->string('name', 155);
            $table->string('color', 155);
            $table->string('license_plate', 255)->unique();
            $table->string('model', 155);
            $table->string('mileage', 155);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicle');
    }
}
