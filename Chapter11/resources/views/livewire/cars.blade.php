<div>

    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Car Listing</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Car Listing</h6>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Rent A Car Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Find Your Car</h1>
            <div class="row">
                
                @foreach($cars as $car)
                    <a href="{{ route('cars.car.details', $car->id) }}">
                    <div class="col-lg-4 col-md-6 mb-2">
                        <div class="rent-item mb-4">
                            <img class="img-fluid mb-4" src="{{ $car->image_url ?? 'img/default-car.png' }}" alt="{{ $car->make }} {{ $car->model }}">
                            <h4 class="text-uppercase mb-4">{{ $car->make }} {{ $car->model }}</h4>
                            <div class="d-flex justify-content-center mb-4">
                                <div class="px-2">
                                    <i class="fa fa-car text-primary mr-1"></i>
                                    <span>{{ $car->year }}</span>
                                </div>
                                <div class="px-2 border-left border-right">
                                    <i class="fa fa-cogs text-primary mr-1"></i>
                                    <span>{{ strtoupper($car->transmission) }}</span>
                                </div>
                                <div class="px-2">
                                    <i class="fa fa-road text-primary mr-1"></i>
                                    <span>{{ number_format($car->mileage) }}K</span>
                                </div>
                            </div>
                            <a class="btn btn-primary px-3" href="">{{ number_format($car->daily_hire_cost, 2) }}/Day</a>
                        </div>
                    </div>
                </a>
                @endforeach
                
            </div>
            <div class="d-flex justify-content-center">
                {{ $cars->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <!-- Rent A Car End -->
</div>
