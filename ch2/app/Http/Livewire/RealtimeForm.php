<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RealtimeForm extends Component
{
    public $first_name;
    public $last_name;
    public $email;
 
    protected $rules = [
        'first_name' => 'required|min:6',
        'last_name' => 'required|min:3',
        'email' => 'required|email',
    ];
    protected $messages = [
        'first_name.required' => 'The first name is required',
        'last_name.required' => 'The last name is required',
        'first_name.min:6' => 'The first name should be a minimum of 6 characters',
        'last_name.min:3' => 'The last name should be a minimum of 3 characters',
        'email.email' => 'Use a valid email address.',
        'email.required' => 'You must fill in the email address field',
    ];
    public function render()
    {
        return view('livewire.realtime-form')
                ->extends('layouts.app')
                ->section('content');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function processData()
    {
        $this->validate();
 
        // Execution doesn't reach here if validation fails.
 
        dd([
            'first_name' => $this->last_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
       ]);
    }
}
