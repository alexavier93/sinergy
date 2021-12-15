<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriaImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria_imagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('galeria_id');
            $table->string('imagem');
            $table->string('thumbnail');

            $table->foreign('galeria_id')->references('id')->on('galerias')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galeria_imagens');
    }
}
