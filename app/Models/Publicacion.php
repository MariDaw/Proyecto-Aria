<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    public function famoso()
    {
        return $this->belongsTo(Famoso::class);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

    public function valoraciones(){
        return $this->hasMany(Valoracion::class);
    }
}
