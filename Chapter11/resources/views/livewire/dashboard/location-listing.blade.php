<div>
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h3 class="page-header"><i class="fa fa-edit"></i>Locations</h3>
                </div>
                <div class="col-lg-2">
                    <a href="#" class="btn btn-info" wire:click.prevent="toggleForm()">Add</a>
                </div>
            </div>

            <!-- edit-profile -->
            <div id="edit-profile" class="tab-pane">
                @if (session()->has('errors'))
                    @foreach ($errors as $error)
                        {{ $error }}
                    @endforeach
                @endif
                @if (\Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
                        {{ Session::get('message') }}</p>
                @endif
                @if ($showForm)
                    <section class="panel">
                        <div class="panel-body bio-graph-info">
                            <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" wire:model="name" class="form-control">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" id="address" wire:model="address" class="form-control">
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" id="city" wire:model="city" class="form-control">
                                            @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" id="state" wire:model="state" class="form-control">
                                            @error('state')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <select id="type" wire:model="type" class="form-control">
                                                <option value="">Select</option>
                                                <option value="pickup">Pickup</option>
                                                <option value="drop">Drop</option>
                                            </select>
                                            @error('type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="is_active">Active</label>
                                            <input type="checkbox" id="is_active" wire:model="is_active" @if($is_active) checked @endif>
                                            @error('is_active')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">{{ $isEditMode ? 'Update Location' : 'Add Location' }}</button>
                                @if ($isEditMode)
                                    <button type="button" class="btn btn-secondary" wire:click="resetForm">Cancel</button>
                                @endif
                            </form>
                        </div>
                    </section>
                @endif
            </div>

            {{-- locations table --}}
            <div x-data="locationTable()">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Type</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $location)
                            <tr>
                                <td>{{ $location->name }}</td>
                                <td>{{ $location->address }}</td>
                                <td>{{ $location->city }}</td>
                                <td>{{ $location->state }}</td>
                                <td>{{ $location->type }}</td>
                                <td>{{ $location->is_active ? 'Yes' : 'No' }}</td>
                                <td>
                                    <button class="btn btn-primary" @click="editLocation({{ $location->id }})">Edit</button>
                                    <button class="btn btn-danger" @click="deleteLocation({{ $location->id }})">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $locations->links() }}
                </div>
            </div>
      
        </section>
    </section>
</div>

<script>
    function locationTable() {
        return {
            editLocation(locationId) {
                @this.call('editLocation', locationId);
            },
            deleteLocation(locationId) {
                if (confirm('Are you sure you want to delete this location?')) {
                    @this.call('deleteLocation', locationId);
                }
            }
        }
    }
</script>
