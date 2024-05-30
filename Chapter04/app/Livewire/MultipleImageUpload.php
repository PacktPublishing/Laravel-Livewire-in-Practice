<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Component;

class MultipleImageUpload extends Component
{
    use WithFileUploads;
    #[Validate(['gallery_images.*' => 'image|max:1024'])]
    public $gallery_images = [];
    public $message = '';
    public function render()
    {
        return view('livewire.multiple-image-upload');
    }


    public function save()
    {

        if (!isset($this->gallery_images) || !is_array($this->gallery_images)) {
            $this->message = "No images selected for upload.";
            return;
        }

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
