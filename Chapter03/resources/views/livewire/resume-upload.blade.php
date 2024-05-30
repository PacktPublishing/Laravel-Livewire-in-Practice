<div>
    <h1 class="text-success" wire:model="message">{{$message}}</h1>
    @if ($user_resume)
    Resume Preview:
    <img src="{{ $user_resume->temporaryUrl() }}" height="100" width="100">
    @endif
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" wire:model="email" class="form-control">

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" wire:model="name">
        </div>
        <div class="form-group">
            <label> Resume</label>
            <input type="file" class="form-control" wire:model="user_resume">

        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" wire:model="password">

        </div>
        <button type="submit" wire:click="saveResume" class="btn btn-primary">Submit</button>
    </form>
</div>