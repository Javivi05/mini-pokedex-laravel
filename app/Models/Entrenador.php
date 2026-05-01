<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    protected $fillable = ['nombre', 'ciudad', 'edad'];
    
    // Un entrenador tiene muchos Pokémon
    public function pokemon()
    {
        return $this->hasMany(Pokemon::class);
    }
}
