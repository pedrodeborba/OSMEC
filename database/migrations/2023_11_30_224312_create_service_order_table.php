<?php

// CreateServiceOrderTable.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOrderTable extends Migration
{
    public function up()
    {
        Schema::create('service_order', function (Blueprint $table) {
            $table->id('id_service_order');
            $table->unsignedBigInteger('part_id_part')->constrained('part')->onDelete('cascade');
            $table->unsignedBigInteger('vehicle_id_vehicle')->constrained('vehicle')->onDelete('cascade');
            $table->unsignedBigInteger('client_id_client')->constrained('client')->onDelete('cascade');
            $table->dateTime('entry_date');
            $table->dateTime('exit_date');
            $table->string('defect_description', 255);
            $table->unsignedBigInteger('mechanic_team_id_mechanic_team')->constrained('equipe_funcionario')->onDelete('cascade');
            $table->timestamps();
            $table->unique('id_service_order');
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_order');
    }
}