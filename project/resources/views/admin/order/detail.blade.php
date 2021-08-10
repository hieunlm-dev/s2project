@extends('admin.layout.layout')

@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Order</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Brand</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Order Detail</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
              <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Customer Address</th>
                <th>Customer Name</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total Money</th>
                <th>Phone</th>
                <th>Status</th>
              </tr>
          </thead>
          <tbody>
            {{-- @foreach($orders as $item) --}}
            {{-- <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->order_date }}</td>
              <td>{{ $item->address }}</td>
              <td>{{ $item->first_name }} {{ $item->last_name }}</td>
              <td>product</td>
              <td>quantity</td>
              <td>money</td>
              <td>{{ $item->phone }}</td>
              <td>{{ $item->status }}</td>
            </tr> --}}
            <tr>
              <td>{{ $orders->id }}</td>
              <td>{{ $orders->order_date }}</td>
              <td>{{ $orders->address }}</td>
              <td>{{ $orders->first_name }} {{ $orders->last_name }}</td>
              <td>{{$orders->product_id}}</td>
              <td>{{$orders->item_count}}</td>
              <td>{{$orders->grand_total}}</td>
              <td>{{ $orders->phone_number }}</td>
              <td>{{ $orders->status }}</td>
              @if ($orders->status == 'pending')
                  <td><a onclick="return confirm('Are you sure to accept order?')" href="{{ route('admin.order.edit', $orders->id) }}" class="btn btn-primary">Accept</a></td>
              @elseif($orders->status == 'processing')
              <td><a onclick="return confirm('Are you sure to complete order?')" href="{{ route('admin.order.edit', $orders->id) }}" class="btn btn-primary">Completed</a></td>
              @endif
              
              
            </tr>
            {{-- @endforeach --}}
          </tbody>
      </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection