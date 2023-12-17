<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    protected $table = 'pokemones';
    public $timestamps = false;
    protected $fillable = ['nombre', 'tipo'];
    public function equipos(){
        return $this->belongsToMany(Equipo::class,'equipos_pokemones');
    }
}
