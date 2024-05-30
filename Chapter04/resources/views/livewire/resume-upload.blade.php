<div>
    @if ($user_resume)
        Resume Preview:
        <img src="{{ $user_resume->temporaryUrl() }}" height="100" width="100">
    @endif

    <h1 class="text-success" wire:model="message">{{ $message }}</h1>
    <form wire:submit.prevent="saveResume">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" wire:model="email" class="form-control">
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" wire:model="name">
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label> Resume</label>
            <input type="file" class="form-control" wire:model="user_resume">
            @error('user_resume')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" wire:model="password">
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
