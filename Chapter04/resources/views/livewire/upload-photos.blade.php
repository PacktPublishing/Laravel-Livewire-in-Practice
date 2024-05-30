<div>
    {{-- The Master doesn't talk, he acts. --}}
    <form wire:submit="save">
        <input type="file" class="form-control" wire:model="photos" multiple>
     
        @error('photos.*') <span class="error">{{ $message }}</span> @enderror
     
        <button class="btn btn-primary" type="submit">Save photo</button>
    </form>
</div>
