<?php

namespace App\Http\Livewire;

use App\Models\Gallery;
use Livewire\WithFileUploads;
use Livewire\Component;

class MultipleImageUpload extends Component
{
    use WithFileUploads;
    public $gallery_images = [];
    public $message = '';
    public function render()
    {
        return view('livewire.multiple-image-upload')
               ->extends('layouts.app')
               ->section('content');
    }

    public function uploadMultiple()
    {
        $this->validate([
            'gallery_images.*' => 'image|max:1024', // 1MB Max
        ]);
 
        foreach ($this->gallery_images as $image) {
            $image = $image->storePublicly('gallery', ['disk' => 'public']);
            $gallery = new Gallery();
            $gallery->gallery_image = $image;
            $result = $gallery->save();
            if ($result) {
                $this->message = "Images uploaded successfully!";
            }
        }
    }
}
