<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrinhoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinho_items', function (Blueprint $table) {
            $table->increments("id");

            $table->integer("quantidade");
            $table->integer("id_produto")->unsigned();
            $table->integer("id_carrinho")->unsigned();

            $table->timestamps();

            $table->foreign("id_produto")
                    ->references("id")->on("produtos")
                    ->onDelete("cascade");
            
            $table->foreign("id_carrinho")
                    ->references("id")->on("carrinhos")
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
        Schema::dropIfExists('carrinho_items');
    }
}
