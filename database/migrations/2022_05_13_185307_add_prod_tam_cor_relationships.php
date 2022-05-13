<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProdTamCorRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_tam_cor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cor_id");
            $table->unsignedBigInteger("produto_tamanho_id");

            $table->timestamps();

            $table->foreign("cor_id")
            ->references("id")->on("cores")
            ->onDelete("cascade");

            $table->foreign("produto_tamanho_id")
            ->references("id")->on("produto_tamanho")
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
        Schema::dropIfExists('prod_tam_cor');

    }
}
