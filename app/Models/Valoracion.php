<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    use HasFactory;

    public Publicacion $publicacion;
    public int $count;

    public function mount(Publicacion $publicacion)
    {
        $this->publicacion = $publicacion;
        $this->count = $publicacion->likes_count;
    }

    public function publicacion(){
        return $this->belongsTo(Publicacion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
