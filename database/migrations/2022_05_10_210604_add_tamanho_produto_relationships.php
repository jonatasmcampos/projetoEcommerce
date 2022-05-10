<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTamanhoProdutoRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamanho_produto', function (Blueprint $table) {
            $table->unsignedBigInteger("id_tamanho");
            $table->unsignedBigInteger("id_produto");


            $table->timestamps();

            $table->foreign("id_tamanho")
                ->references("id")->on("tamanhos")
                ->onDelete("cascade");

            $table->foreign("id_produto")
                ->references("id")->on("produtos")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tamanho_produto');
    }
}
