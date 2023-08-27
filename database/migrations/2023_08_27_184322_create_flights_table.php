<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fonte_id');
            $table->timestamps();

            $table->foreign('fonte_id')->references('id')->on('fonte_de_recurso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receitas', function (Blueprint $table) {
            $table->dropForeign(['fonte_id']); // Remove a chave estrangeira
        });

        Schema::dropIfExists('receitas'); // Remove a tabela receitas
    }
};
