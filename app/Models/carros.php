<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carros extends Model
{
    protected $table = 'carros';
    protected $fillable = [
        'marca_id',
        'modelo_id',
        'cor_id',
        'preco',
        'km',
        'ano_fabricacao',
        'detalhes',
        'foto1',
        'foto2',
        'foto3',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function cor()
    {
        return $this->belongsTo(Cor::class);
    }
}
