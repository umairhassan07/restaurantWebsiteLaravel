@extends('admin.layouts.default')

@section('head-content')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update Reservation</h4>
        <form class="forms-sample" id="reservations" action="{{ route('add-reservation') }}" method="POST">
            @csrf
            <input type="hidden" name="page_name" value="admin_page">
            <input type="hidden" name="id" value="{{ $reservation['id'] }}">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Name *</label>
                        <input type="text" class="form-control"  value="{{ $reservation['name'] }}" name="name" placeholder="Name">
                        @error('name')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Email *</label>
                        <input type="text" class="form-control" value="{{ $reservation['email'] }}" name="email" placeholder="email">
                        @error('email')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="exampleInputName1">Phone *</label>
                    <input type="number" name="phone" id="phone" value="{{ $reservation['phone'] }}" placeholder="phone" class="form-control">
                    @error('phone')
                        <small class="alert-class">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="exampleInputName1">Number Of Guests *</label>
                    <select name="number_guests" class="form-control" style="height: 49px;"  >
                        <option value="0">Select Number Of Guests</option>
                        <option value="1" {{ $reservation['number_of_guests'] == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $reservation['number_of_guests'] == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $reservation['number_of_guests'] == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $reservation['number_of_guests'] == 4 ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $reservation['number_of_guests'] == 5 ? 'selected' : '' }}>5</option>
                        <option value="6" {{ $reservation['number_of_guests'] == 6 ? 'selected' : '' }}>6</option>
                        <option value="7" {{ $reservation['number_of_guests'] == 7 ? 'selected' : '' }}>7</option>
                        <option value="8" {{ $reservation['number_of_guests'] == 8 ? 'selected' : '' }}>8</option>
                        <option value="9" {{ $reservation['number_of_guests'] == 9 ? 'selected' : '' }}>9</option>
                        <option value="10" {{ $reservation['number_of_guests'] == 10 ? 'selected' : '' }}>10</option>
                        <option value="11" {{ $reservation['number_of_guests'] == 11 ? 'selected' : '' }}>11</option>
                        <option value="12" {{ $reservation['number_of_guests'] == 12 ? 'selected' : '' }}>12</option>
                    </select>
                    @error('number-guests')
                        <small class="alert-class">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="">Reservation Date</label>
                    @php
                        $date = date('Y-m-d' ,strtotime($reservation['reservation_date'] ));
                    @endphp
                    <input type="date" name="reservation_date" value="{{ $date }}" class="form-control">  
                    @error('reservation_date')
                        <small class="alert-class">{{ $message }}</small>
                    @enderror  
                </div>
                <div class="col-md-6">
                    <label for="">Time</label>
                    <select name="time" class="form-control" style="height: 49px;" >
                        <option value="0">Select Time</option>
                        <option value="Breakfast" {{ ($reservation['time'] == 'breakfast' || $reservation['time'] == 'Breakfast') ? 'selected' : '' }} >Breakfast</option>
                        <option value="Lunch" {{ ($reservation['time'] == 'lunch' || $reservation['time'] == 'Lunch') ? 'selected' : '' }}>Lunch</option>
                        <option value="Dinner" {{ ($reservation['time'] == 'dinner' || $reservation['time'] == 'Dinner') ? 'selected' : '' }}>Dinner</option>
                    </select>  
                    @error('time')
                        <small class="alert-class">{{ $message }}</small>
                    @enderror  
                </div>
            </div>
            <div class="row">
                <label for="">Message</label>
                <textarea name="message" class="form-control" style="width: 98%; margin:auto;">{{ $reservation['message'] }}</textarea>
                @error('message')
                <small class="alert-class">{{ $message }}</small>
                @enderror 
            </div>
            <hr>

          <button type="submit" class="btn btn-primary me-2">Upload</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection

