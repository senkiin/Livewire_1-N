<?php

namespace App\Livewire;

use Livewire\Component;

class Ejemplo extends Component
{

    public int $num = 0;

    public function mas(){
       $this-> num++;
    }
    public function render()
    {
        return view('livewire.ejemplo');
    }
}
