<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrinhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinhos', function (Blueprint $table) {
            $table->increments("id");

            $table->decimal("valor_total", 10,2);
            $table->string("status", 20)->unique();
            $table->datetime("data");
            $table->integer("id_endereco")->unsigned();

            $table->timestamps();

            $table->foreign("id_endereco")
                    ->references("id")->on("enderecos")
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
        Schema::dropIfExists('carrinhos');
    }
}
