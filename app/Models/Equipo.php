<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table = 'equipos';
    public $timestamps = false;
    protected $fillable = ['nombre'];

    public function entrenadores(){
        return $this->belongsTo(Entrenador::class, 'entrenadores_id');
    }

    public function pokemones(){
        return $this->belongsToMany(Pokemon::class, 'equipos_pokemones', 'equipos_id', 'pokemones_id')->withPivot('orden');
    }
}
