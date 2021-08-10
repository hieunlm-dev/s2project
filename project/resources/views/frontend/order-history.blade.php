@extends('frontend.layout.layout')

@section('contents')


<div class="container">

<center><h2>Order History</h2></center>

<div class="card-body p-0">
    <table class="table table-striped projects">
      <thead>
          <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Customer Address</th>
            <th>Total Money</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
      </thead>
      <tbody>
        @foreach($orders as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->order_date }}</td>
          <td>{{ $item->address }}</td>
          <td>money</td>
          <td>{{ $item->status }}</td>
          <a href="{{ route('admin.customer.edit', $item->id) }}"
            class="btn btn-danger">Cancle</a>
        </tr>
        @endforeach
      </tbody>
  </table>
  </div>
</div><!--end container-->

@endsection