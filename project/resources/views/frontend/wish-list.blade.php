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
          <td>{{number_format($item->product['price'],0,'','.')}}₫</td>
          <td>
            @if ($item->product['quantity']>0)
            Available
            @else
            Not Available
            @endif
          </td>
         <td>
          <a href="#"
            class="btn btn-primary add-to-cart" data-id="{{ $item->product['id']}}">Add To Cart</a>
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
@if(isset($item))
@section('my-scripts')
<script>
	// setup csrf-token cho post method
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.add-to-cart').click(function(e) {
        e.preventDefault();     // hủy chức năng chuyển trang của thẻ a
        quantity = 1;
		    pid = $(this).data('id');
        // pid= $('#pid').val();
        //alert(quantity);

        $.ajax({
            type:'GET',
            url:'{{ route('add-cart') }}',
            data:{pid:pid, quantity:quantity},
            success:function(data){
                swal({
					title: "Adding successfully",
					text: "This product has been successfully added to your cart",
					icon: "success",
					button: "Okay!",
				}).then(function(){
					window.location.reload();
				});
            }
        });	
	})
</script>
@endsection
@endif