@extends('frontend.layout.layout')

@section('contents')


<div class="container">

<center><h2>Wish  List</h2></center>

<div class="card-body p-0">
    <table class="table table-striped projects">
      <thead>
          <tr>
            <th>List ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Status</th>
            <th>Add-to-cart</th>
          </tr>
      </thead>
      <tbody>
        @foreach($lists as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->product['name'] }}</td>
          <td><img src="{{asset('/images/'.$item->product['image'])}}" alt="" style="width: 150px; height:100px;"></td>
          <td>{{$item->product['price']}}</td>
          <td>Status</td>
         <td>Add-to-cart</td>
        </tr>
        @endforeach
      </tbody>
  </table>
  </div>
</div><!--end container-->

@endsection