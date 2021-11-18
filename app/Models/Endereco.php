<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'logradouro',
        'numero',
        'bairro',
        'complemento',
        'cep',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
