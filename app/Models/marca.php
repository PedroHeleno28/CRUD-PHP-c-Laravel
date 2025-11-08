<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marca extends Model
{
    protected $table = 'marcas';
    protected $fillable = ['marca_nome', 'logo'];

    public function modelos()
    {
        return $this->hasMany(Modelo::class);
    }
}
