<?php

namespace App\Models;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'localizacao',
        'data_inicio',
        'data_fim',
        'numero_vagas',
        'vagas_disponiveis',
        'imagem',
        'preco'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}