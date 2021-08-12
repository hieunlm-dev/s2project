@extends('frontend.layout.layout')

@section('contents')


<div class="container">

<center><h2>Wish  List</h2></center>

<div class="card-body p-0">
    <table class="table table-striped projects">
      <thead>
          <tr>
            
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
      </thead>
      <tbody>
        @foreach($lists as $item)
        <tr>
  
          <td>{{ $item->product['name'] }}</td>
          <td><img src="{{asset('/images/'.$item->product['image'])}}" alt="" style="width: auto; height:80px;"></td>
          <td>{{$item->product['price']}}</td>
          <td>Status</td>
         <td>
          <a href="#"
            class="btn btn-primary">Add To Cart</a>
        <form style="display:inline-block"
            action="{{ route('wish-list.destroy', $item->id) }}" method="POST">
            @method("DELETE")
            @csrf
            <button class="btn btn-danger">Delete</button>
        </form>

         </td>
        </tr>
        @endforeach
      </tbody>
  </table>
  </div>
</div><!--end container-->

@endsection