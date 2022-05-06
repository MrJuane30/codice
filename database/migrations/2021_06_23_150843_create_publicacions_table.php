<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_publicacions', function(Blueprint $table){
            $table->id();
            $table->string('nombre');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::create('publicacions', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion');
            $table->text('contenido');
            $table->string('imagen');
            $table->foreignId('user_id')->references('id')->on('users')->comment('El usuario que crea la publicación');
            $table->foreignId('categoria_id')->references('id')->on('categoria_publicacions'); 
            $table->text('fuentes')->nullable();
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
        Schema::dropIfExists('categoria_publicacions');
        Schema::dropIfExists('publicacions');
    }
}
