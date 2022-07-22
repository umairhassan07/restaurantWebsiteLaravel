@extends('admin.layouts.default')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <style>
        .tb-image{
          width: 50px !important;
          height: 50px !important;
          border-radius: 5px !important;
          border: 1px solid gray;
          object-fit: cover;
        }
        table th {
            width: auto !important;
        }
      </style>
      <div class="card-body">
        <h4 class="card-title">Sliders <a href="{{ route('add-slider') }}" class="btn btn-primary" style="float: right;">Add New Slider</a></h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> # </th>
              <th> Image </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            

            @foreach ($sliders as $key => $slider)
            <tr>
              <td> {{$key+1}} </td>
              <td> <img src="{{ asset('images/sliders/'. $slider->image) }}" class="tb-image"> </td>
              <td> <a href="{{ route('edit-slider', ['id' => $slider->id]) }}" class="btn btn-secondary">Edit</a> <a href="{{ route('delete-slider', ['id' => $slider->id]) }}" class="btn btn-danger">Delete</a> </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection