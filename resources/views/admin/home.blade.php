@extends('admin.layouts.default')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body text-center">
                      <h5 class="mb-2 text-dark font-weight-normal">Total Reservations</h5>
                      <h2 class="mb-4 text-dark font-weight-bold">{{ $reservations }}</h2>
                      <p class="mt-4 mb-0">Booked</p>
                      <a href="{{ route('reservations') }}"><h4 class="mb-0 font-weight-bold mt-2 text-dark">View</h4></a>
                    </div>
                  </div>
                </div>
                <!-- total cheffs -->
                <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body text-center">
                        <h5 class="mb-2 text-dark font-weight-normal">Total Cheffs</h5>
                        <h2 class="mb-4 text-dark font-weight-bold">{{ $cheffs }}</h2>
                        {{-- <p class="mt-4 mb-0">Booked</p> --}}
                        <a href="{{ route('our-cheff') }}"><h4 class="mb-0 font-weight-bold mt-2 text-dark">View</h4></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body text-center">
                        <h5 class="mb-2 text-dark font-weight-normal">Total Users</h5>
                        <h2 class="mb-4 text-dark font-weight-bold">{{ $users }}</h2>
                        {{-- <p class="mt-4 mb-0">Booked</p> --}}
                        <a href="{{ route('users') }}"><h4 class="mb-0 font-weight-bold mt-2 text-dark">View</h4></a>
                      </div>
                    </div>
                  </div>
                
               
                
              </div>
        </div>
    </div>

@endsection