<?php

namespace App\Http\Livewire;

use App\Models\Famoso;
use App\Models\Publicacion;
use App\Models\Valoracion;
use Livewire\Component;
use Livewire\WithPagination;

class Paginador extends Component
{


    public $famosoSelect = 'All';

    use WithPagination;




    public function render()
    {


        $famosos = Famoso::all();



        return view('livewire.paginador', [
            'publicaciones' => Publicacion::orderBy('titulo', 'DESC')->paginate(3),
            'famosos' => $famosos,


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
