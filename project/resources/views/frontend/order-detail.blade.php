@extends('frontend.layout.layout')

@section('contents')


<div class="container">

<center><h2>Order Detail</h2></center>
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
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Customer Address</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
      </thead>
      <tbody>
        @foreach($orderDetail as $item)
        <tr>
          <td>{{ $item->order_id }}</td>
          <td>{{ $item->order_date }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->quantity }}</td>
          <td>{{number_format($item->price * $item->quantity,0,'','.')}}₫</td>
          <td>{{ $item->address }}</td>
          <td>{{ $item->status }}</td>
          <td>
            <a onclick="return confirm('Are you sure to cancel order?')" href="{{ route('history.edit', $item->order_id) }}"
            class="btn btn-danger">Cancel</a>
          </td>
        </tr>
        @endforeach
      </tbody>
  </table>
  <div style="text-align:right; color:red; font-size:15px"><strong>Total = {{number_format($item->grand_total,0,'','.') }} ₫</strong></div>
  <a  href="{{ route('history.index') }}" class="btn btn-primary text-center" >Back to Order History</a>
  
  </div>
</div><!--end container-->

@endsection