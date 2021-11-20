<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_entrada', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_entrada');
            $table->unsignedBigInteger('id_produto');
            $table->double('valor_produto', 8,2)->default(0);
            $table->double('valor_fabrica', 8,2)->default(0);
            $table->double('quantidade', 8,2)->default(0);
            $table->timestamps();

            $table->foreign('id_entrada')->references('id')->on('entrada');
            $table->foreign('id_produto')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens_entrada');
    }
}
