<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments("id");

            $table->string("nome", 100);
            $table->string("email")->unique();
            $table->string("senha");
            $table->string("perfil");
            $table->string("cpf", 11)->unique();
            $table->string("telefone");
            $table->string("foto", 100)->nullable(); //foto pode ser nulo

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
