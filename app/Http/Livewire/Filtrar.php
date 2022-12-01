<?php

namespace App\Http\Livewire;

use App\Models\Famoso;
use App\Models\Publicacion;
use App\Models\Valoracion;
use Livewire\Component;

class Filtrado extends Component
{


    public $famosoSelect = 'All';



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
        return view('livewire.filtrado', [
            'publicaciones' => $publicaciones,
            'famosos' => $famosos,
            'valoraciones' => $valoraciones,
        ]);
        /* dd($this->famosoSelect); */

    }


}
