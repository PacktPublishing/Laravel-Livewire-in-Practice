<?php

namespace App\Livewire\Dashboard;

use App\Models\Car;
use Livewire\Attributes\Layout;
use Livewire\Component;


class CarListing extends Component
{

    #[Layout('components.layouts.admin')]


    public $carId;
    public $make;
    public $model;
    public $year;
    public $mileage = 0;
    public $transmission;
    public $daily_hire_cost;
    public $features;
    public $image_url;
    public $available = true;
    public $is_featured = false;
    public $views = 0;
    public $is_approved = false;
    public $isEditMode = false;
    public $showForm = false;



    public function render()
    {
        return view('livewire.dashboard.car-listing', [
            'cars' => Car::paginate(10)
        ]);
    }

    public function mount()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->carId = null;
        $this->make = '';
        $this->model = '';
        $this->year = '';
        $this->mileage = 0;
        $this->transmission = '';
        $this->daily_hire_cost = 0.00;
        $this->features = '';
        $this->image_url = '';
        $this->available = true;
        $this->is_featured = false;
        $this->views = 0;
        $this->is_approved = false;
        $this->isEditMode = false;
        $this->showForm = false;
    }



    public function store()
    {
        $this->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'mileage' => 'required',
            'transmission' => 'required',
            'daily_hire_cost' => 'required|numeric|min:0',
            'features' => 'nullable|string',
            'image_url' => 'nullable|string|url',
            'available' => 'boolean',
            'is_featured' => 'boolean',
            'views' => 'integer|min:0',
        ]);

        Car::create([
            'user_id' => auth()->id(),
            'make' => $this->make,
            'model' => $this->model,
            'year' => $this->year,
            'mileage' => $this->mileage,
            'transmission' => $this->transmission,
            'daily_hire_cost' => $this->daily_hire_cost,
            'features' => $this->features,
            'image_url' => $this->image_url,
            'available' => $this->available,
            'is_featured' => $this->is_featured,
            'views' => $this->views,
            'is_approved' => $this->is_approved,
        ]);

        session()->flash('message', 'Car created successfully.');

        $this->resetForm();
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }



    public function update()
    {

        $car = Car::findOrFail($this->carId);

        $car->update([
            'make' => $this->make,
            'model' => $this->model,
            'year' => $this->year,
            'mileage' => $this->mileage,
            'transmission' => $this->transmission,
            'daily_hire_cost' => $this->daily_hire_cost,
            'features' => $this->features,
            'image_url' => $this->image_url,
            'available' => $this->available,
            'is_featured' => $this->is_featured,
            'views' => $this->views,
            'is_approved' => $this->is_approved,
        ]);

        session()->flash('message', 'Car updated successfully.');

        $this->resetForm();
        $this->showForm = false;
    }

    public function editCar($id)
    {
        $car = Car::findOrFail($id);
        $this->carId = $car->id;
        $this->make = $car->make;
        $this->model = $car->model;
        $this->year = $car->year;
        $this->mileage = $car->mileage;
        $this->transmission = $car->transmission;
        $this->daily_hire_cost = $car->daily_hire_cost;
        $this->features = $car->features;
        $this->image_url = $car->image_url;
        $this->available = $car->available;
        $this->is_featured = $car->is_featured;
        $this->views = $car->views;
        $this->is_approved = $car->is_approved;
        $this->isEditMode = true;
        $this->showForm = true;
    }

    public function deleteCar($id)
    {
        Car::findOrFail($id)->delete();
        session()->flash('message', 'Car deleted successfully.');
    }
}
