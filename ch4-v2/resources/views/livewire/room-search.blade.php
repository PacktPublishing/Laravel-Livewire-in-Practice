<div wire:offline.class.remove="bg-success" class="bg-light">
    <div wire:loading.delay>
        Searching for rooms...
    </div>
    <div wire:loading.remove>
        <input wire:model="room_search" type="search" placeholder="Search rooms...">

        <h1>Search Results:</h1>

        <ul>
            @foreach($rooms as $room)
            <li>{{ $room->title }}</li>
            @endforeach
        </ul>
    </div>
</div>