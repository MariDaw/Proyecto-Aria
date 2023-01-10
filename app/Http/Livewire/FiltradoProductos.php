<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\producto_categoria;
use Livewire\Component;
use Livewire\WithPagination;

class FiltradoProductos extends Component
{   public $productoSelect = 'All';

    use WithPagination;

    // public $active;
    // public $q;


    public function render()
    {

        // $productos = Producto::where('titulo', $this->productoSelect)
        //             ->when( $this->productoSelect, function($query) {
        //                 return $query->where(function ($query) {
        //                     $query->where('titulo', 'like', '%'.$this->productoSelect . '%');
        //                 })->paginate(4);

        //             })

        //     ->when($this->active, function( $query){
        //         return $query->active();
        //     });
            // $query = $productos->toSql();


        $productos = Producto::all();

        if ($this->productoSelect == 'All')
        {
            $producto = Producto::all();
        }
         else {
            $productoLive = Categoria::where('nombre', $this->productoSelect)->get()[0]->nombre;

            $producto = Producto:: where('titulo', $productoLive)->get();
        }

        $categorias = Categoria::all();

        return view('livewire.filtrado-productos', [
            'productosAll' => $productos,
            'productos' => $producto,
            'categorias' => $categorias,
        ]);
        /* dd($this->famosoSelect); */


    }

    public function updatingActive()
    {
        $this->resetPage();
    }

    public function updatingproductoSelect()
    {
        $this->resetPage();
    }

}
