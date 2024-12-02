<?php

namespace App\Livewire;

use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $x['title'] = "Home Perpustakaan";
        return view('livewire.home-component')->layoutData($x);
    }
}
