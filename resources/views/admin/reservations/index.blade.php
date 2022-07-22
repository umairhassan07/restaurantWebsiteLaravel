@extends('admin.layouts.default')

@section('content')
<style>
  table {
    word-break: break-word;
  }
</style>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card" style="overflow:auto">
      <div class="card-body">
        <h4 class="card-title">All Reservations <a href="{{ route('add-reservation-form') }}" class="btn btn-primary" style="float: right;">Add Reservation</a></h4>
        <table class="table table-bordered table-responsive">
          <thead>
            <tr>
              <th> # </th>
              <th> Name </th>
              <th> Email </th>
              <th> Phone </th>
              <th> Number Of Guests </th>
              <th> Date </th>
              <th> Time </th>
              <th> Message </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            
         
            @forelse ($reservations as $key => $reservation)
            <tr>
              <td> {{ $key+1 }} </td>
              <td> {{ $reservation['name'] }}</td>
              <td> {{ $reservation['email'] }}</td>
              <td> {{ $reservation['phone'] }}</td>
              <td> {{ $reservation['number_of_guests'] }}</td>
              <td> {{ $reservation['reservation_date'] }}</td>
              <td> {{ $reservation['time'] }}</td>
              <td> {{ $reservation['message'] }}</td>
              <td> 
                <a href="{{ route('edit-reservation', ['id' => $reservation['id']]) }}" class="btn btn-secondary">Edit</a> 
                <a onclick="confirm('Are you sure you want to delete this item?')" href="{{ route('delete-reservation', ['id' => $reservation['id']] ) }}" class="btn btn-danger">Delete</a> 
              </td>
            </tr>
            
            @empty
            <tr>
              <p>No Reservations Available</p>
            </tr>
            @endforelse
          </tbody>
        </table>
         <div class="pagination" style="margin-top: 10px;">
            <p style="line-height: 40px;">showing {{ $reservations->perPage() }} of {{ $reservations->total(); }}</p>
            <p style="margin: 0 auto;">{!! $reservations->render("pagination::bootstrap-4"); !!} </p>
         </div>
      </div>
    </div>
  </div>
@endsection