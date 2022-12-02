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

    use WithPagination;

    public $active;
    public $q;



    public function render()
    {
        $publicaciones = Famoso::where('nombre', $this->famosoSelect)
                    ->when( $this->famosoSelect, function($query) {
                        return $query->where(function ($query) {
                            $query->where('nombre', 'like', '%'.$this->famosoSelect . '%');
                        });

                    })

            ->when($this->active, function( $query){
                return $query->active();
            });
            $query = $publicaciones->toSql();
            $publicaciones = $publicaciones->paginate(10);


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
            'query' => $query,
        ]);
        /* dd($this->famosoSelect); */

    }

    public function updatingActive()
    {
        $this->resetPage();
    }

    public function updatingFamosoSelect()
    {
        $this->resetPage();
    }

}
