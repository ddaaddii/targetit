<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Endereco;
use App\Models\Tipo_Usuario;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telefone',
        'celular',
        'cpf',
        'tipos_usuarios_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function enderecos()
    {
        return $this->hasMany(Endereco::class);
    }

    public function tipo_usuario()
    {
        return $this->belongsTo(Tipo_Usuario::class);
    }

    public function checharPermissao($checar)
    {
        $permissao = Tipo_Usuario::where('id', auth()->user()->tipos_usuarios_id)->first();
        if(!$permissao || !$permissao->$checar){
            abort(403, "Você não tem permissão para realizar essa ação");
        }
        return $permissao;
    }
}
