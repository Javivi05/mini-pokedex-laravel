<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Combate extends Model
{
    protected $fillable = ['pokemon_local_id', 'pokemon_visitante_id','fecha', 'resultado'];

    //Un combate tiene un pokemon local
    public function pokemonLocal(){
        return $this->belongsTo(Pokemon::class, 'pokemon_local_id');
    }

    //Un combate tiene un pokemon visitante
    public function pokemonVisitante(){
        return $this->belongsTo(Pokemon::class, 'pokemon_visitante_id');
    }
}
