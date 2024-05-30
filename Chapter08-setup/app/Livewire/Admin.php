<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Admin extends Component
{

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin');
    }
}
