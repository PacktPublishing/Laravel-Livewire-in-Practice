<div class="row mt-5">
    <div class="col-md-6 col-md-offset-3">
        <form wire:submit.prevent="processData">
            <input type="text" class="form-control mt-2" wire:model="first_name" placeholder="Enter First Name">
            @error('first_name') <span class="text-danger">{{ $message }}</span> @enderror
            <input type="text" class="form-control mt-2" wire:model="last_name" placeholder="Enter Last Name">
            @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
            <input type="email" class="form-control mt-2 mb-3" wire:model="email" placeholder="Enter Email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

</div>