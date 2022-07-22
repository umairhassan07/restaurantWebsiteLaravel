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
        <h4 class="card-title">Our Chefs <a href="{{ route('add-cheff') }}" class="btn btn-primary" style="float: right;">Add New Chef</a></h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> # </th>
              <th> Image </th>
              <th> Name </th>
              <th> Designation </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            
            
            @foreach ($cheff as $key=> $chef)
                
            <tr>
              <td> {{ $key+1 }} </td>
              <td> <img src="{{ asset('images/cheffs/'.$chef['image']) }}" class="tb-image"> </td>
              <td> {{ $chef['name'] }}</td>
              <td> {{ $chef['designation'] }} </td>
              <td> 
                <a href="{{ route('edit-cheff', ['id'=>$chef['id'] ]) }}" class="btn btn-secondary">Edit</a> 
                <a href="{{ route('delete-cheff', ['id'=> $chef['id']] ) }}" class="btn btn-danger">Delete</a> 
              </td>
            </tr>
            @endforeach
            
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection