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
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin.order.index')}}">Order List</a></li>
            <li class="breadcrumb-item active">Order Detail</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Main content -->
              <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                  <div class="col-12">
                    @foreach($orderDetail as $item)
                      @endforeach
                    <h4>
                      <small class="float-right">Order Date: {{$item->order_date}}</small>
                    </h4>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-5 invoice-col">
                    Shipping Information
                    <address>
                      <strong>{{$item->first_name}} {{$item->last_name}}</strong><br>
                      {{$item->address}}<br>
                      {{$item->phone_number}}<br>
                      {{$item->email}}
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col float-right">
                    <br>
                    <b>Order ID:</b> {{$item->order_id}}<br>
                    <b>Status:</b> <b style="color:red">{{strtoupper($item->status)}}</b><br>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($orderDetail as $item)
                      <tr>
                        <td><figure><img src="{{asset('images/' . $item -> image) }}" alt="{{$item->name}}" width="100px"></figure></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{ number_format($item->price,0,'','.')}} ₫</td>
                        <td>{{number_format($item->quantity*$item->price,0,'','.')}} ₫</td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <div class="row">
                  <div class="col-6">
                    <p class="lead">Order Summary</p>
  
                    <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <th style="width:50%">Subtotal:</th>
                          <td><b>{{ number_format($item->grand_total,0,'','.')}} ₫</b></td>
                        </tr>
                        <tr>
                          <th>Shipping:</th>
                          <td>FREE SHIPPING</td>
                        </tr>
                        <tr>
                          <th>Total:</th>
                          <td><b>{{ number_format($item->grand_total,0,'','.')}} ₫</b></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-6 float-right">
                    <br>
                    <br>
                    @if ($item->status == 'pending')
                    <td><a onclick="return confirm('Are you sure to accept order?')" href="{{ route('admin.order.edit', $item->order_id) }}" class="btn btn-primary">Accept</a></td>
                   @elseif($item->status == 'processing')
                    <td><a onclick="return confirm('Are you sure to complete order?')" href="{{ route('admin.order.edit', $item->order_id) }}" class="btn btn-primary">Completed</a></td>
                  @endif 

                  </div>
                </div>
                <!-- /.row -->
  
              </div>
              <!-- /.invoice -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection