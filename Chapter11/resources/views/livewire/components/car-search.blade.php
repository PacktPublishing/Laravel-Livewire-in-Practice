<div>
    <div class="container-fluid bg-white pt-3 px-lg-5">
        <div class="row mx-n2">
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <input 
                    type="text" 
                    class="form-control mb-3" 
                    placeholder="Make" 
                    wire:model.debounce.500ms="make"
                />
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <input 
                    type="text" 
                    class="form-control mb-3" 
                    placeholder="Model" 
                    wire:model.debounce.500ms="model"
                />
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select 
                    class="custom-select px-4 mb-3" 
                    style="height: 50px;" 
                    wire:model="transmission"
                >
                    <option selected>Transmission</option>
                    <option value="Auto">Auto</option>
                    <option value="Manual">Manual</option>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <button 
                    class="btn btn-primary btn-block mb-3" 
                    type="button" 
                    style="height: 50px;" 
                    wire:click="search"
                >Search</button>
            </div>
        </div>

        @if($searchInitiated)
            @if($cars->isNotEmpty())
                <div class="row mt-4">
                    @foreach($cars as $car)
                    <a href="{{ route('cars.car.details', $car->id) }}">


                        <div class="col-lg-4 col-md-6 mb-2">
                            <div class="rent-item mb-4">
                                <img class="img-fluid mb-4" src="{{ $car->image_url }}" alt="">
                                <h4 class="text-uppercase mb-4">{{ $car->make }} {{ $car->model }}</h4>
                                <div class="d-flex justify-content-center mb-4">
                                    <div class="px-2">
                                        <i class="fa fa-car text-primary mr-1"></i>
                                        <span>{{ $car->year }}</span>
                                    </div>
                                    <div class="px-2 border-left border-right">
                                        <i class="fa fa-cogs text-primary mr-1"></i>
                                        <span>{{ $car->transmission }}</span>
                                    </div>
                                    <div class="px-2">
                                        <i class="fa fa-road text-primary mr-1"></i>
                                        <span>{{ $car->mileage }}</span>
                                    </div>
                                </div>
                                <a class="btn btn-primary px-3" href="">$ {{ $car->daily_hire_cost }}/Day</a>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            @else
                <div class="row mt-4">
                    <div class="col-md-12">
                        <p>No cars found.</p>
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>
