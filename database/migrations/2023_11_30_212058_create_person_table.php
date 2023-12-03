<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// CreatePessoaTable.php
class CreatePersonTable extends Migration
{
    public function up()
    {
        Schema::create('person', function (Blueprint $table) {
            $table->id('id_person');
            $table->string('name', 155);
            $table->string('email', 255)->unique();
            $table->string('password', 50)->nullable();
            $table->string('profile', 45);
            $table->string('rg', 10);
            $table->string('cpf', 14);
            $table->string('phone', 15)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('person');
    }
}