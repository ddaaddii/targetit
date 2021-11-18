<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo_Usuario extends Model
{
    use SoftDeletes;

    protected $table = "tipos_usuarios";

    protected $fillable = [
        'id', 'perfil_acesso', 'created_at', 'updated_at', 
        'criar_usuario', 'alterar_usuario', 'exibir_usuario', 'excluir_usuario',
        'criar_endereco', 'alterar_endereco', 'exibir_endereco', 'excluir_endereco',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
