@extends('admin.layouts.default')

@section('head-content')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Reservation</h4>
        <div class="alert alert-success" id="alert-success" style="display:none;">
            <b><i class="fa fa-check" aria-hidden="true"></i></b>
        </div>
        <form class="forms-sample" id="reservations" action="{{ route('add-reservation') }}" method="POST">
            @csrf
            <input type="hidden" name="page_name" value="admin_page">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Name *</label>
                        <input type="text" class="form-control " name="name" placeholder="Name">
                        @error('name')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Email *</label>
                        <input type="text" class="form-control " name="email" placeholder="email">
                        @error('email')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="exampleInputName1">Phone *</label>
                    <input type="number" name="phone" id="phone" placeholder="phone" class="form-control">
                    @error('phone')
                        <small class="alert-class">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="exampleInputName1">Number Of Guests *</label>
                    <select name="number_guests" class="form-control" style="height: 49px;" >
                        <option value="0">Select Number Of Guests</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    @error('number-guests')
                        <small class="alert-class">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="">Reservation Date</label>
                    <input type="date" name="reservation_date" class="form-control">  
                    @error('reservation_date')
                        <small class="alert-class">{{ $message }}</small>
                    @enderror  
                </div>
                <div class="col-md-6">
                    <label for="">Time</label>
                    <select name="time" class="form-control" style="height: 49px;" >
                        <option value="0">Select Time</option>
                        <option value="breakfast">Breakfast</option>
                        <option value="lunch">Lunch</option>
                        <option value="dinner">Dinner</option>
                    </select>  
                    @error('time')
                        <small class="alert-class">{{ $message }}</small>
                    @enderror  
                </div>
            </div>
            <div class="row">
                <label for="">Message</label>
                <textarea name="message" class="form-control" style="width: 98%; margin:auto;"></textarea>
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

