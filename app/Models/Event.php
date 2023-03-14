<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'localizacao',
        'data_hora',
        'numero_vagas',
        'vagas_disponiveis',
    ];
}