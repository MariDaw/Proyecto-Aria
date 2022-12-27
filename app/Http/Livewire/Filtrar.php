<?php

namespace App\Http\Livewire;

use App\Models\Famoso;
use App\Models\Publicacion;
use App\Models\Valoracion;
use Livewire\Component;
use Livewire\WithPagination;

class Filtrar extends Component
{


    public $famosoSelect = 'All';

    public $busqueda = "";

    use WithPagination;

    public $active;
    public $query;



    public function render()
    {
        $publicaciones = Famoso::where('nombre', $this->busqueda)
            ->when($this->busqueda, function ($query) {
                return $query->where(function ($query) {
                    $query->where('nombre', 'ilike', "%$this->busqueda%");
                }
                );

            });

            // ->when($this->active, function( $query){
            //     return $query->active();
            // });
            // $query = $publicaciones->toSql();





        if ($this->famosoSelect == 'All')
        {
            $publicaciones = Publicacion::all();
        }
         else {
            $famosoLive = Famoso::where('nombre', $this->famosoSelect)->get()[0]->id;

            $publicaciones = Publicacion:: where('famoso_id', $famosoLive)->get() ;


        }

        $famosos = Famoso::all();
        $valoraciones = Valoracion::all();
        return view('livewire.filtrar', [
            'publicaciones' => $publicaciones,
            'famosos' => $famosos,
            'valoraciones' => $valoraciones,
            // 'query' => $query,
        ]);
        /* dd($this->famosoSelect); */

    }

    // public function paginador()
    // {   $publicaciones = Famoso::where('nombre', $this->famosoSelect)
    //                 ->when( $this->famosoSelect, function($query) {
    //                     return $query->where(function ($query) {
    //                         $query->where('nombre', 'like', '%'.$this->famosoSelect . '%');
    //                     });

    //                 })

    //         ->when($this->active, function( $query){
    //             return $query->active();
    //         });
    //         $query = $publicaciones->toSql();



    //     $famosos = Famoso::all();
    //     $valoraciones = Valoracion::all();
    //     return view('livewire.filtrar', [
    //         'publicaciones' => $publicaciones,
    //         'publicaciones' => Publicacion::paginate(4),
    //         'famosos' => $famosos,
    //         'valoraciones' => $valoraciones,

    //     ]);
    //     /* dd($this->famosoSelect); */

    // }

    public function updatingActive()
    {
        $this->resetPage();
    }

    public function updatingFamosoSelect()
    {
        $this->resetPage();
    }

}
