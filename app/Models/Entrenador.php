<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    use HasFactory;
    protected $table = 'entrenadores';
    public $timestamps = false;
    protected $fillable = ['nombre'];
    
    public function equipos(){
        return $this->hasMany(Equipo::class, 'entrenadores_id');
    }
}
