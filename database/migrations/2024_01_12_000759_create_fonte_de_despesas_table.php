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
        Schema::create('fonte_de_despesa', function (Blueprint $table) {
            $table->id();
            $table->string('fonte_de_despesa');
            $table->timestamps();
            $table->integer('tipofonte')->unsigned();
            $table->unsignedBigInteger('user_id'); // Adicione esta linha
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fonte_de_despesa');
    }
};
