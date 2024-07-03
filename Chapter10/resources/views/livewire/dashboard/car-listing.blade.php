<div>
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-10">
                    <h3 class="page-header"><i class="fa fa-edit"></i>Cars</h3>
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
                                            <label for="make">Make</label>
                                            <input type="text" id="make" wire:model="make" class="form-control">
                                            @error('make')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="model">Model</label>
                                            <input type="text" id="model" wire:model="model" class="form-control">
                                            @error('model')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="year">Year</label>
                                            <input type="number" id="year" wire:model="year" class="form-control">
                                            @error('year')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="daily_hire_cost">Daily Hire Cost</label>
                                            <input type="number" step="0.01" id="daily_hire_cost" wire:model="daily_hire_cost" class="form-control">
                                            @error('daily_hire_cost')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="mileage">Mileage</label>
                                            <input type="number" id="mileage" wire:model="mileage" class="form-control">
                                            @error('mileage')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="transmission">Transmission</label>
                                            <select id="transmission" wire:model="transmission" class="form-control">
                                                <option value="">Select</option>
                                                <option value="Manual">Manual</option>
                                                <option value="Auto">Auto</option>
                                            </select>
                                            @error('transmission')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="features">Features</label>
                                            <textarea id="features" wire:model="features" class="form-control"></textarea>
                                            @error('features')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image_url">Image URL</label>
                                            <input type="text" id="image_url" wire:model="image_url" class="form-control">
                                            @error('image_url')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="available">Available</label>
                                            <input type="checkbox" id="available" wire:model="available" @if($available) checked @endif>
                                            @error('available')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="is_featured">Featured</label>
                                            <input type="checkbox" id="is_featured" wire:model="is_featured" @if($is_featured) checked @endif>
                                            @error('is_featured')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="is_approved">Approved</label>
                                            <input type="checkbox" id="is_approved" wire:model="is_approved" @if($is_approved) checked @endif>
                                            @error('is_approved')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">{{ $isEditMode ? 'Update Car' : 'Add Car' }}</button>
                                @if ($isEditMode)
                                    <button type="button" class="btn btn-secondary" wire:click="resetForm">Cancel</button>
                                @endif
                            </form>
                        </div>
                    </section>
                @endif
            </div>

            {{-- cars table --}}
            <div x-data="carTable()">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Mileage</th>
                            <th>Transmission</th>
                            <th>Daily Hire Cost</th>
                            <th>Available</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cars as $car)
                            <tr>
                                <td>{{ $car->make }}</td>
                                <td>{{ $car->model }}</td>
                                <td>{{ $car->year }}</td>
                                <td>{{ $car->mileage }}</td>
                                <td>{{ $car->transmission }}</td>
                                <td>{{ $car->daily_hire_cost }}</td>
                                <td>{{ $car->available ? 'Yes' : 'No' }}</td>
                                <td>
                                    <button class="btn btn-primary" @click="editCar({{ $car->id }})">Edit</button>
                                    <button class="btn btn-danger" @click="deleteCar({{ $car->id }})">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $cars->links() }}
                </div>
            </div>
      
        </section>
    </section>
</div>

<script>
    function carTable() {
        return {
            editCar(carId) {
                @this.call('editCar', carId);
            },
            deleteCar(carId) {
                if (confirm('Are you sure you want to delete this car?')) {
                    @this.call('deleteCar', carId);
                }
            }
        }
    }
</script>
