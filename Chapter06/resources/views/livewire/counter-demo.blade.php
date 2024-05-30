<div>
    <div x-data>
        <h1 x-text="$wire.totalCount"></h1>

        <button class="btn btn-warning" x-on:click="$wire.decrementCount()">-</button>
        <button class="btn btn-primary" x-on:click="$wire.incrementCount()">+</button>
    </div>
</div>
