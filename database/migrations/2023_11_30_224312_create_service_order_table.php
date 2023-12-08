<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOrderTable extends Migration
{
    public function up()
    {
        Schema::create('service_order', function (Blueprint $table) {
            $table->id('id_service_order');
            $table->dateTime('entry_date');
            $table->dateTime('exit_date');
            $table->text('defect');
            $table->text('solution');
            $table->float('work_price');
            $table->float('total');
            $table->tinyInteger('status');
            $table->unsignedBigInteger('vehicle_id_vehicle_fk');
            $table->unsignedBigInteger('mechanic_team_id_mechanic_team');
            $table->unsignedBigInteger('client_id_client_fk');
            $table->timestamps();

            $table->foreign('vehicle_id_vehicle_fk')->references('id_vehicle')->on('vehicle')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('mechanic_team_id_mechanic_team')->references('id_mechanic_team')->on('mechanic_team')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('client_id_client_fk')->references('id_client')->on('client')->onDelete('NO ACTION')->onUpdate('NO ACTION');

            $table->unique('id_service_order');
            $table->index('vehicle_id_vehicle_fk');
            $table->index('mechanic_team_id_mechanic_team');
            $table->index('client_id_client_fk');
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_order');
    }
}
