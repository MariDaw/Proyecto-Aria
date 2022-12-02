<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class FiltradoProductos extends Component
{   public $productoSelect = 'All';

    use WithPagination;

    public $active;
    public $q;


    public function render()
    {

        $productos = Producto::where('titulo', $this->productoSelect)
                    ->when( $this->productoSelect, function($query) {
                        return $query->where(function ($query) {
                            $query->where('titulo', 'like', '%'.$this->productoSelect . '%');
                        });

                    })

            ->when($this->active, function( $query){
                return $query->active();
            });
            $query = $productos->toSql();
            $productos = $productos->paginate(10);

        $productos = Producto::all();
        if ($this->productoSelect == 'All')
        {
            $producto = Producto::all();
        }
         else {
            $productoLive = Producto::where('titulo', $this->productoSelect)->get()[0]->titulo;

            $producto = Producto:: where('titulo', $productoLive)->get();


        }

        /* $producto = Producto::all(); */
        return view('livewire.filtrado-productos', [
            'productosAll' => $productos,
            'productos' => $producto,
            'producto' => $producto,
            'query' => $query,

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
