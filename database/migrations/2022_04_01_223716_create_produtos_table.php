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
            $table->increments("id");

            $table->string("produto", 150);
            $table->string("descricao", 255)->nullable();
            $table->decimal("preco", 10,2);
            $table->decimal("desconto", 10,2)->nullable();
            $table->integer("id_categoria")->unsigned();

            $table->timestamps();

            $table->foreign("id_categoria")
                    ->references("id")->on("categorias")
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
