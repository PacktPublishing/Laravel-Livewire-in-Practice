<?php

namespace App\Http\Livewire;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ShowGallery extends Component
{
    public $images;
    public function render()
    {
        $this->images = Gallery::all();

        return view('livewire.show-gallery')
        ->extends('layouts.app')
        ->section('content');
    }
    public function DownloadImage($id)
    {
        $image = Gallery::find($id);
        // dd($image->gallery_image);
        return Storage::disk('public')->download($image->gallery_image);
    }
}
