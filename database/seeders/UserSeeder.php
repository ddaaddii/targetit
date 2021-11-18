<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = DB::table('tipos_usuarios')->insert([
            'perfil_acesso' => 'admin',
            'criar_usuario' => 1,
            'alterar_usuario' => 1,
            'exibir_usuario' => 1,
            'excluir_usuario' => 1,
            'criar_endereco' => 1,
            'alterar_endereco' => 1,
            'exibir_endereco' => 1,
            'excluir_endereco' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@targetit.com',
            'password' => Hash::make('123456789'),
            'tipos_usuarios_id' => 1,
        ]);

        DB::table('configs')->insert([
            'api_token' => 999999,
        ]);
    }
}
