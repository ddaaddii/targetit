<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_usuarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('perfil_acesso')->nullable();
            $table->boolean('criar_usuario')->nullable();
            $table->boolean('alterar_usuario')->nullable();
            $table->boolean('exibir_usuario')->nullable();
            $table->boolean('excluir_usuario')->nullable();
            $table->boolean('criar_endereco')->nullable();
            $table->boolean('alterar_endereco')->nullable();
            $table->boolean('exibir_endereco')->nullable();
            $table->boolean('excluir_endereco')->nullable();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_usuarios');
    }
}
