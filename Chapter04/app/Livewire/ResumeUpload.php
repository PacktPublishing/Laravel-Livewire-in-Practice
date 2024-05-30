<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

class ResumeUpload extends Component
{
    use WithFileUploads;
    public $name;
    public $email;
    public $user_resume;
    public $password;
    public $message = '';

    // #[Layout('layouts.another-layout')]
    public function render()
    {
        return view('livewire.resume-upload');
    }

    public function saveResume()
    {

        $this->validate([
            'user_resume' => 'image|max:1024',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // $user_resume = $this->user_resume->store('resumes');
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user_resume = $this->user_resume->storeAs('resumes', 'user' . explode(' ', $this->name)[0] . '.' . $this->user_resume->extension());
        $user->user_resume = $user_resume;
        $user->password = Hash::make($this->password);
        $result = $user->save();
        if ($result) {
            $this->message = "User created successfully";
        }
    }
}
