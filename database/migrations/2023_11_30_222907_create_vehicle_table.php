<?php

// CreateVehicleTable.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration {
    public function up() {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id('id_vehicle');
            $table->string('name', 155);
            $table->string('color', 155);
            $table->string('license_plate', 8)->unique();
            $table->string('model', 155);
            $table->float('mileage');
            $table->unsignedBigInteger('client_id_client')->constrained('client')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('vehicle');
    }
}

