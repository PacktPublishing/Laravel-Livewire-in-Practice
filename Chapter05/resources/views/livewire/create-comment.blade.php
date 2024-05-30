<div>
    <form wire:submit.prevent="save">
        <div class="mb-3">
           <h3>{{$post->title}}</h3>
           <p>{{$post->body}}</p>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Comment</label>
            <textarea class="form-control" id="exampleFormControlInput2" wire:model="content"></textarea>
            @error('comment')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
