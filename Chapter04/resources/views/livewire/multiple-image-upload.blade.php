<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div>
        <h1 class="text-success" wire:model="message">{{ $message }}</h1>
        <form wire:submit="save">
            <div class="form-group">
                <label> Upload Images</label>
                <input type="file" class="form-control" wire:model="gallery_images" multiple>
                @error('gallery_images.*')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Upload Images</button>
        </form>
    </div>

</div>
