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
      </style>
      <div class="card-body">
        <h4 class="card-title">Users <a href="{{ route('add-user') }}" class="btn btn-primary" style="float: right;">Add New User</a></h4>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> # </th>
              <th> Name </th>
              <th> Email </th>
              <th> Role </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            

            @foreach ($users as $key => $user)
            <tr>
              <td> {{$key+1}} </td>
              <td> {{ $user['name'] }}</td>
              <td> {{ $user['email'] }}</td>
              <td> <img id="blah" class="tb-image" src="{{ asset('images/users/'.$user['image']) }}" alt="user image"> </td>
              <td> {{ ($user['role_as'] == '1') ? 'Admin' : 'User' }}</td>
              <td> 
                <a href="{{ route('edit-user', ['id' => $user->id]) }}" class="btn btn-secondary">Edit</a> 
                <a href="{{ route('delete-user', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a> 
              </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
        <div class="pagination" style="margin-top: 10px;">
            <p style="line-height: 40px;">showing {{ $users->count() }} of {{ $users->total(); }}</p>
            <p style="margin: 0 auto;">{!! $users->render("pagination::bootstrap-4"); !!} </p>
         </div>
      </div>
    </div>
  </div>
@endsection