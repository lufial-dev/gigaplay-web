<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConteudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conteudos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao');
            $table->string('diretorio')->unique();
            $table->Integer('classificacao')->nulable();
            $table->string('imagem')->unique(); 
            $table->integer('visualizacoes')->default(0);
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('genero_id')->nullable();
           

            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conteudos');
    }
}
