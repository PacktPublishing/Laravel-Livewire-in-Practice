<?php

namespace App\Http\Livewire;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use App\Models\Room;

class RoomSearch extends Component
{
    use AuthorizesRequests;

    public $room_search;
    public $room;

    protected $queryString = ['room_search'];

    public function mount(Room $room)
    {
        $this->room = $room;
    }
 
    public function render()
    {
        return view('livewire.room-search', [
            'rooms' => Room::where('title', 'like', '%'.$this->room_search.'%')->get(),
        ])->extends('layouts.app')
        ->section('content');
        
    }

    public function updateRoom()
    {
        $this->authorize('update', $this->room);
 
        $this->room->update(['title' => $this->title]);
    }
}
