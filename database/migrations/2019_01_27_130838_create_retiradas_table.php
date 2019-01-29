<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetiradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retiradas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantidade');
            $table->integer('produto_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('retiradas', function (Blueprint $table) {
            $table->foreign('produto_id')
                ->references('id')
                ->on('produtos')
                ->onDelete('cascade');
            $table->foreign('usuario_id')
                ->references('id')
                ->on('usuarios')
                ->onDelete('cascade'); 
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retiradas');
    }
}
