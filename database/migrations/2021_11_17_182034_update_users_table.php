<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('cpf')->nullable();

            $table->unsignedBigInteger('tipos_usuarios_id')->nullable();

            $table->index('tipos_usuarios_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('telefone');
            $table->dropColumn('celular');
            $table->dropColumn('cpf');
        });
    }
}
