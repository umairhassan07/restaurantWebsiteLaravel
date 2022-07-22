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
        <h4 class="card-title">Sliders <a href="{{ route('add-menu') }}" class="btn btn-primary" style="float: right;">Add Menu</a></h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> # </th>
              <th> Image </th>
              <th> Title </th>
              <th> Description </th>
              <th> Price </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            
            @foreach ($menu as  $men)
            <tr>
              <td> {{1}} </td>
              <td> <img src="{{ asset('images/menu/'.$men['image']) }}" class="tb-image"> </td>
              <td> {{$men['title']}} </td>
              <td> {!! $men['description'] !!} </td>
              <td> {{$men['price']}} OMR </td>
              <td> 
                <a href="{{ route('edit-menu',['id'=> $men['id']]) }}" class="btn btn-secondary">Edit</a> 
                <a href="{{ route('delete-menu', ['id'=>$men['id']]) }}" class="btn btn-danger">Delete</a> 
              </td>
            </tr>
            @endforeach
            
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection