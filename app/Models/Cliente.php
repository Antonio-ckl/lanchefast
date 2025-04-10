<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable =[
        'nome',
        'endereco',
        'telefone',
        'cpf',
        'email',
        'senha'
    ];

    protected $hidden = [
        'senha',
        'remeber_token',
    ];
    use HasFactory;
}
