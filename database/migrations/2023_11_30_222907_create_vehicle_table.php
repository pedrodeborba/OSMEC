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
            $table->string('license_plate', 255)->unique(); // Remover a restrição única daqui
            $table->string('model', 155);
            $table->string('mileage', 155);
            
            // Alteração na chave estrangeira
            $table->unsignedBigInteger('client_id_client');
            $table->foreign('client_id_client')->references('id_client')->on('client')->onDelete('cascade');
            
            $table->timestamps();
            $table->unique('id_vehicle');
        });
    }

    public function down()
    {
        // Remover a restrição única antes de excluir a tabela
        Schema::table('vehicle', function (Blueprint $table) {
            $table->dropUnique('vehicle_license_plate_unique');
        });

        Schema::dropIfExists('vehicle');
    }
}

