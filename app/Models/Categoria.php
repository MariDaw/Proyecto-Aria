<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = "categorias";
    protected $fullable = [
        'name',
        'slug',
        'description',
        'status',
        'popular',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
