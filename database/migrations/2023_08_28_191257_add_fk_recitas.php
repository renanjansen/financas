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
        Schema::table('receitas', function (Blueprint $table) {

            $table->unsignedBigInteger('user_id'); // Adicione esta linha



            $table->foreign('user_id')->references('id')->on('users'); // Adicione esta linha
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

            $table->dropForeign(['user_id']); // Drop da chave estrangeira
            $table->dropColumn('user_id'); // Remove a coluna
        });

    }
};
