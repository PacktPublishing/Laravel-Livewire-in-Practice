<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Form extends Component
{
    public $first_name;
    public $last_name;
    public $email;
 
    // protected $rules = [
    //     'first_name' => 'required|min:6',
    //     'last_name' => 'required|min:3',
    //     'email' => 'required|email',
    // ];
    protected function rules()
    {
        return [
             'first_name' => 'required|min:6',
            'last_name' => 'required|min:3',
            'email' => 'required|email',
        ];
    }
    public function render()
    {
        return view('livewire.form')
                ->extends('layouts.app')
                ->section('content');
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
