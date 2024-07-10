<?php

namespace App\Livewire\Dashboard;

use App\Models\Location;
use Livewire\Attributes\Layout;
use Livewire\Component;

class LocationListing extends Component
{
    #[Layout('components.layouts.admin')]
    public $locationId;
    public $name;
    public $address;
    public $city;
    public $state;
    public $type;
    public $is_active;
    public $isEditMode = false;
    public $showForm = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'address' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'state' => 'nullable|string|max:255',
        'type' => 'required|in:pickup,drop',
        'is_active' => 'boolean',
    ];

    public function render()
    {

        $locations = Location::paginate(10);

        return view('livewire.dashboard.location-listing', ['locations' => $locations]);
    }

    public function toggleForm()
    {
        $this->resetForm();
        $this->showForm = !$this->showForm;
    }

    public function resetForm()
    {
        $this->locationId = null;
        $this->name = '';
        $this->address = '';
        $this->city = '';
        $this->state = '';
        $this->type = '';
        $this->is_active = true;
        $this->isEditMode = false;
    }

    public function store()
    {
        $this->validate();

        Location::create([
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'type' => $this->type,
            'is_active' => $this->is_active,
        ]);

        session()->flash('message', 'Location added successfully.');
        $this->resetForm();
    }

    public function editLocation($id)
    {
        $location = Location::findOrFail($id);

        $this->locationId = $location->id;
        $this->name = $location->name;
        $this->address = $location->address;
        $this->city = $location->city;
        $this->state = $location->state;
        $this->type = $location->type;
        $this->is_active = $location->is_active;
        $this->isEditMode = true;
        $this->showForm = true;
    }

    public function update()
    {
        $this->validate();

        $location = Location::findOrFail($this->locationId);

        $location->update([
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'type' => $this->type,
            'is_active' => $this->is_active,
        ]);

        session()->flash('message', 'Location updated successfully.');
        $this->resetForm();
    }

    public function deleteLocation($id)
    {
        Location::destroy($id);
        session()->flash('message', 'Location deleted successfully.');
    }
}
