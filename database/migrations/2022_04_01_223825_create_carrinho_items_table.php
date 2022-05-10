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
            $table->id();

            $table->integer("quantidade");
            $table->unsignedBigInteger("id_produto");
            $table->unsignedBigInteger("id_carrinho");

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
