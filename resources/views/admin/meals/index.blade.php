@extends('admin.layouts.default')

@section('content')
<style>
  table {
    word-break: break-word;
  }
  .table td img {
    width: 56px;
    height: 56px;
    border-radius: 10%;
  }
</style>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="overflow:auto">
      <div class="card-body">
        <h4 class="card-title">All Meals <a href="{{ route('add-meal-form') }}" class="btn btn-primary" style="float: right;">Add New Meal</a></h4>
        <table class="table table-bordered table-responsive">
          <thead>
            <tr>
              <th> # </th>
              <th> Name </th>
              <th> Image </th>
              <th> Description </th>
              <th> Price </th>
              <th> Type </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            
         
            @forelse ($meals as $key => $value )
            <tr>
              <td> {{ $key+1 }} </td>
              <td> {{ $value['name'] }}</td>
              <td> <img src="{{ asset('images/meals/'. $value->image) }}" alt="meal image"></td>
              <td> {{ $value['description'] }}</td>
              <td> {{ $value['price'] }} </td>
              <td> {{ $value['type'] }} </td>
              <td> 
                <a href="{{ route('edit-meal', ['id' => $value['id']]) }}" class="btn btn-secondary">Edit</a> 
                <a onclick="confirm('Are you sure you want to delete this item?')" href="{{ route('delete-meal', ['id' => 1] ) }}" class="btn btn-danger">Delete</a> 
              </td>
            </tr>
            @empty
            <tr>
              <p class="text-center">No Record Found</p>
            </tr>
            @endforelse
            
          </tbody>
        </table>
         <div class="pagination" style="margin-top: 10px;">
            <p style="line-height: 40px;">showing {{ $meals->count() }} of {{ $meals->total() }}</p>
            <p style="margin: 0 auto;">{!! $meals->render("pagination::bootstrap-4"); !!} </p>
         </div>
      </div>
    </div>
  </div>
@endsection