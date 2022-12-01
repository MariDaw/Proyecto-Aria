<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class FiltradoProductos extends Component
{   public $productoSelect = 'All';


    public function render()
    {
        $productos = Producto::all();
        if ($this->productoSelect == 'All')
        {
            $producto = Producto::all();
        }
         else {
            $productoLive = Producto::where('titulo', $this->productoSelect)->get()[0]->id;

            $producto = Producto:: where('id', $productoLive)->get();


        }

        /* $producto = Producto::all(); */
        return view('livewire.filtrado-productos', [
            'productosAll' => $productos,
            'productos' => $producto,

        ]);
        /* dd($this->famosoSelect); */

    }

}
