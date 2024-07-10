<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class Welcome extends Component
{
    public function render()
    {
        return view(
            'livewire.welcome',
            ['cars' => Car::where('available', 1)->where('is_featured', 1)->get()]
        );
    }
}
