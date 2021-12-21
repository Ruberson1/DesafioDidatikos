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

            $table->increments('id');
            $table->string('codProduto'); // codigo de barras
            $table->string('nomeProduto', 191);
            $table->decimal('valorProduto', 8, 2);
            $table->integer('estoque');

            $table->string('cidade_id', 60);
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
