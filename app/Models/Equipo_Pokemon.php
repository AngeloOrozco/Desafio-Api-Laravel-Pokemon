<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo_Pokemon extends Model
{
    use HasFactory;
    protected $table = 'equipos_pokemones';
    public $timestamps = false;
    protected $fillable = ['orden'];
}
