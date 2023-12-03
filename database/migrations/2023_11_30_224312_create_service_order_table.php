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
            $table->dateTime('entry_date');
            $table->dateTime('exit_date');
            $table->string('descricao_defeito', 255);
            $table->unsignedBigInteger('vehicle_id_vehicle_fk')->constrained('vehicle')->onDelete('cascade');
            $table->unsignedBigInteger('client_id_client_fk')->constrained('client')->onDelete('cascade');
            $table->unsignedBigInteger('admin_person_id_person_fk')->constrained('person')->onDelete('cascade');
            $table->timestamps();
            $table->unique('id_service_order');
        });
    }


    public function down()
    {
        Schema::dropIfExists('service_order');
    }
}