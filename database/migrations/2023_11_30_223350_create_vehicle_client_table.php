<?php

// CreateCarroClienteTable.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleClientTable extends Migration
{
    public function up()
    {
        Schema::create('vehicle_client', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id_client_fk')->constrained('client')->onDelete('cascade');
            $table->unsignedBigInteger('vehicle_id_vehicle_fk')->constrained('vehicle')->onDelete('cascade');
            $table->primary(['client_id_client_fk', 'vehicle_id_vehicle_fk']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicle_client');
    }
}