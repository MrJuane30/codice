<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColectivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });**/
        Schema::create('colectivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            //$table->foreignId('categoria_id')->constrained();
            $table->string('imagen_principal');
            $table->string('direccion');
            $table->string('colonia');
            $table->string('lat');
            $table->string('lng');
            $table->string('pagina_web')->nullable();
            $table->string("hashtag")->nullable();
            $table->text('descripcion');
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
        Schema::dropIfExists('colectivos');
        Schema::dropIfExists('categorias');
    }
}
