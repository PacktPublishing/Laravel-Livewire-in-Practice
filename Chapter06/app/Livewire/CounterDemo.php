<?php

namespace App\Livewire;

use Livewire\Component;

class CounterDemo extends Component
{
    public function render()
    {
        return view('livewire.counter-demo');
    }

    public $totalCount = 0;

    public function incrementCount()
    {
        $this->totalCount++;
    }

    public function decrementCount()
    {
        $this->totalCount--;
    }
}
