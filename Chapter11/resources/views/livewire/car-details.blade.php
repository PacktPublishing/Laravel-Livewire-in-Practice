<div>
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Car Detail</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Car Detail</h6>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Detail Start -->
    <div class="container-fluid pt-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <h1 class="display-4 text-uppercase mb-5">{{ $car->make }} {{ $car->model }}</h1>
                    <div class="row mx-n2 mb-3">
                        <div class="col-md-3 col-6 px-2 pb-2">
                            <img class="img-fluid w-100" src="{{ $car->image_url ?? 'img/default-car.png' }}" alt="{{ $car->make }} {{ $car->model }}">
                        </div>
                    </div>
                    <p>{{ $car->features }}</p>
                    <div class="row pt-2">
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-car text-primary mr-2"></i>
                            <span>Model: {{ $car->year }}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-cogs text-primary mr-2"></i>
                            <span>{{ $car->transmission }}</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-road text-primary mr-2"></i>
                            <span>{{ number_format($car->mileage) }} km</span>
                        </div>
                        <div class="col-md-3 col-6 mb-2">
                            <i class="fa fa-eye text-primary mr-2"></i>
                            <span>{{ $car->features }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-5">
                    <div class="bg-secondary p-5">
                        <h3 class="text-primary text-center mb-4">Rent this car</h3>
                        <div class="form-group">
                            <select class="custom-select px-4" style="height: 50px;">
                                <option selected>Pickup Location</option>
                                <option value="1">Location 1</option>
                                <option value="2">Location 2</option>
                                <option value="3">Location 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="custom-select px-4" style="height: 50px;">
                                <option selected>Drop Location</option>
                                <option value="1">Location 1</option>
                                <option value="2">Location 2</option>
                                <option value="3">Location 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="date" id="date1" data-target-input="nearest">
                                <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Date" data-target="#date1" data-toggle="datetimepicker" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="time" id="time1" data-target-input="nearest">
                                <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Time" data-target="#time1" data-toggle="datetimepicker" />
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button class="btn btn-primary btn-block" type="submit" style="height: 50px;">Rent Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->

    <!-- Related Car Start -->
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <h2 class="mb-4">Related Cars</h2>
            <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
                @forelse($relatedCars as $relatedCar)
               
                    <div class="rent-item">
                        <img class="img-fluid mb-4" src="{{ $relatedCar->image_url ?? 'img/default-car.png' }}" alt="">
                        <h4 class="text-uppercase mb-4">{{ $relatedCar->make }} {{ $relatedCar->model }}</h4>
                        <div class="d-flex justify-content-center mb-4">
                            <div class="px-2">
                                <i class="fa fa-car text-primary mr-1"></i>
                                <span>{{ $relatedCar->year }}</span>
                            </div>
                            <div class="px-2 border-left border-right">
                                <i class="fa fa-cogs text-primary mr-1"></i>
                                <span>{{ strtoupper($relatedCar->transmission) }}</span>
                            </div>
                            <div class="px-2">
                                <i class="fa fa-road text-primary mr-1"></i>
                                <span>{{ number_format($relatedCar->mileage) }} km</span>
                            </div>
                        </div>
                        <a class="btn btn-primary px-3" href="{{ route('cars.car.details', $car->id) }}">{{ number_format($relatedCar->daily_hire_cost, 2) }} $/Day</a>
                    </div>
              
                @empty
                    <p>No related cars found.</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Related Car End -->
</div>
