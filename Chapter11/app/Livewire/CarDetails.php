<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class CarDetails extends Component
{
    public $car;
    public $relatedCars;

    public function mount($id)
    {
        $this->car = Car::findOrFail($id);
        $this->relatedCars = Car::where('make', $this->car->make)
            // ->where('model', $this->car->model)
            ->where('id', '!=', $this->car->id)
            ->get();
    }

    public function render()
    {
        return view('livewire.car-details', [
            'car' => $this->car,
            'relatedCars' => $this->relatedCars,
        ]);
    }
}
