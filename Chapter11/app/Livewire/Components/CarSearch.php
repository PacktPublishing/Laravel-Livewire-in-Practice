<?php

namespace App\Livewire\Components;

use App\Models\Car;
use Livewire\Component;
use Livewire\Attributes\Url;

class CarSearch extends Component
{
    #[Url]
    public $make;
    #[Url]
    public $model;
    #[Url]
    public $transmission;
    public $searchInitiated = false;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'make' => 'nullable|string|max:255',
            'model' => 'nullable|string|max:255',
            'transmission' => 'nullable|in:Manual,Auto',
        ]);
    }

    public function search()
    {
        $this->searchInitiated = true;
    }

    public function render()
    {
        $cars = collect();

        if ($this->searchInitiated) {
            $query = Car::query();

            if ($this->make) {
                $query->where('make', 'like', '%' . $this->make . '%');
            }

            if ($this->model) {
                $query->where('model', 'like', '%' . $this->model . '%');
            }

            if ($this->transmission) {
                $query->where('transmission', $this->transmission);
            }

            $cars = $query->get();
        }

        return view('livewire.components.car-search', [
            'cars' => $cars,
        ]);
    }
}
