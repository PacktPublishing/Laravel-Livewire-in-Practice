<div>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <input type="text" wire:model.live="keyword">

    <ul>
        @foreach ($posts as $post)
            <li wire:key="{{ $post->id }}"><a href="#">{{ $post->title }}</a></li>
        @endforeach
    </ul>
</div>
