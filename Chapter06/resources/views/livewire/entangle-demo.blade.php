<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div x-data="{data: @entangle('data')}" class="mt-5">
                <h1 class="text-primary">@ntangle Demo</h1>
                <h4>Fruits:</h4>
                <ul>
                    <template x-for="fruit in data">
                        <li x-text="fruit"></li>
                    </template>
                </ul>

            </div>
            <button type="button" x-on:click="$wire.$refresh()">

        </div>
    </div>
</div>
