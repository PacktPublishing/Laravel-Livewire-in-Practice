<div class="mt-5" x-data="{ open: false }">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, deleniti?</p><button class="btn btn-success"
        @click="open = true">Action...</button>

    <ul x-show="open" @click.outside="open = false">
        <li><button class="btn btn-primary" wire:click="editMethod">Edit</button></li>
        <li><button class="btn btn-danger" wire:click="deleteMethod">Delete</button></li>
    </ul>
</div>
</ul>
</div>
