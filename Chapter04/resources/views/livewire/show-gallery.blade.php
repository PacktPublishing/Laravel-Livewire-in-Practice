<div>
    <div class="row">
        @forelse ($images as $image)
        <div class="col-md-3">
            <img src="{{ url('storage/'.$image->gallery_image) }}" class="img img-responsive" alt="" height="200"
                width="200">
            <a href="#" class="btn btn-success" wire:click.prevent="DownloadImage({{ $image->id }})">Download</a>
        </div>
        @empty
        <p>No images found in gallery</p>
        @endforelse
    </div>
</div>
