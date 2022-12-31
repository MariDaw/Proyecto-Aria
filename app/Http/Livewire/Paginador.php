<?php

namespace App\Http\Livewire;

use App\Models\Famoso;
use App\Models\Publicacion;
use App\Models\User;
use App\Models\Valoracion;
use Livewire\Component;
use Livewire\WithPagination;

class Paginador extends Component
{


    use WithPagination;

    public $searchTerm;

    public $famosoSelect = 'All';

    public $active;


    public function render()
    {
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
            // 'publicaciones' =>	Publicacion::where(function($sub_query){
            //     $sub_query->where('titulo', 'like', '%'.$this->searchTerm.'%')
            //               ->orWhere('descripcion', 'like', '%'.$this->searchTerm.'%');
            // })->paginate(3),
            'famosos' => $famosos,
            'valoraciones' => $valoraciones,
            'publicaciones' => $publicaciones,


        ]);

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
