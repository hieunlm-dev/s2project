@extends('frontend.layout.layout')

@section('contents')


<div class="container">

<center><h2>Order History</h2></center>
<div>
    @if(session('alert'))
  
      <section class='alert alert-success'>{{session('alert')}}</section>
  
  @endif  
  </div>
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
          <td>{{ number_format($item->grand_total,0,'','.') }} ₫</td>
          <td>{{ $item->status }}</td>
          <td>
            <a  href="{{ route('history.show', $item->id) }}"
            class="btn btn-primary">Detail</a>
            <a onclick="return confirm('Are you sure to cancel order?')" href="{{ route('history.edit', $item->id) }}"
            class="btn btn-danger">Cancel</a>

          </td>
        </tr>
        @endforeach
      </tbody>
  </table>
  
  </div>

</div><!--end container-->

@endsection