<?php

namespace App\Http\Livewire;

use App\Models\Famoso;
use App\Models\Publicacion;
use App\Models\Valoracion;
use Livewire\Component;
use Livewire\WithPagination;

class Paginador extends Component
{

    public $q;
    public $search = '';

    use WithPagination;

    public $active;


    public function render()
    {
        $publicaciones = Famoso::where('nombre', $this->q)
                    ->when( $this->q, function($query) {
                        return $query->where(function ($query) {
                            $query->where('nombre', 'like', '%'.$this->q . '%');
                        });

                    })

            ->when($this->active, function( $query){
                return $query->active();
            });
            $query = $publicaciones->toSql();




/*
        if ($this->famosoSelect == 'All')
        {
            $publicaciones = Publicacion::all();
        }
         else {
            $famosoLive = Famoso::where('nombre', $this->famosoSelect)->get()[0]->id;

            $publicaciones = Publicacion:: where('famoso_id', $famosoLive)->get() ;


        } */

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

    public function updatingQ()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    /* public function render()
    {


        $famosos = Famoso::all();
        $publicaciones = Publicacion::where('title', 'like', '%'.$this->search.'%')->paginate(10);


        return view('livewire.paginador', [
            'publicaciones' => $publicaciones,
            'publicaciones' => Publicacion::where('title', 'like', '%'.$this->search.'%')->paginate(10),
            'famosos' => $famosos,


        ]);


    } */


}
