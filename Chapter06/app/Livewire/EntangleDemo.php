<?php

namespace App\Livewire;

use Livewire\Component;

class EntangleDemo extends Component
{
    public $data;
    public function render()
    {
        $this->data = ['oranges', 'bananas', 'apples', 'mangoes'];

        return view('livewire.entangle-demo');
    }
}
