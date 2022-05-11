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
        Schema::create('produto_tamanho', function (Blueprint $table) {
            $table->unsignedBigInteger("produto_id");
            $table->unsignedBigInteger("tamanho_id");


            $table->timestamps();

            $table->foreign("produto_id")
                ->references("id")->on("produtos")
                ->onDelete("cascade");

                $table->foreign("tamanho_id")
                ->references("id")->on("tamanhos")
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
