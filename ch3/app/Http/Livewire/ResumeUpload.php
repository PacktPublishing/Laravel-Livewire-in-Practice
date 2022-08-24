<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class ResumeUpload extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $user_resume;
    public $password;
    public $message ='';
    public function render()
    {
        return view('livewire.resume-upload')
                ->extends('layouts.app')
                ->section('content');
    }

    public function saveResume()
    {
        $this->validate([
            'user_resume' => 'image|max:1024', // 1MB Max
        ]);
 
        $user_resume = $this->user_resume->store('resumes');
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->user_resume= $user_resume;
        $user->password = Hash::make($this->password);
        $result = $user->save();
        if ($result) {
            $this->message = "User created successfully";
        }
    }
}
