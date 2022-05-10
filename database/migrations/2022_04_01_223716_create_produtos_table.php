<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();

            $table->string("nome");
            $table->string("cor")->nullable();
            $table->decimal("custo", 8, 2);
            $table->decimal("lucro", 8, 2);
            $table->decimal("preco", 8, 2);
            $table->decimal("estoque", 8, 2);
            $table->unsignedBigInteger("id_categoria");
            $table->unsignedBigInteger("id_desconto")->nullable();


            $table->timestamps();

            $table->foreign("id_categoria")
                ->references("id")->on("categorias")
                ->onDelete("cascade");

            $table->foreign("id_desconto")
                ->references("id")->on("descontos")
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
        Schema::dropIfExists('produtos');
    }
}
