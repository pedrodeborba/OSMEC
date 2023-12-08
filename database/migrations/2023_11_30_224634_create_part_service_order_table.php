<?php

// CreatePartServiceOrderTable.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartServiceOrderTable extends Migration
{
    public function up()
    {
        Schema::create('part_service_order', function (Blueprint $table) {
            $table->unsignedBigInteger('part_id_part')->constrained('part')->onDelete('cascade');
            $table->unsignedBigInteger('service_order_id_service_order')->constrained('service_order')->onDelete('cascade');
            $table->primary(['part_id_part', 'service_order_id_service_order']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('part_service_order');
    }
}