<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithPagination;

class Cars extends Component
{
    use WithPagination;

    public function render()
    {
        $cars = Car::paginate(3);

        return view('livewire.cars', [
            'cars' => $cars,
        ]);
    }
}
