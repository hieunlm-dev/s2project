@extends('admin.layout.layout')

@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
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
        <h3 class="card-title">Product List</h3>

        <div class="card-tools">
          <a href="{{ route('admin.product.create') }}"><i class="fas fa-plus"></i></i></i></a>
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <div>
          @if(session('alert'))
            <section class='alert alert-success'>{{session('alert')}}</section>
          @endif  
        </div>
        <div>
          @if(session('warning'))
            <section class='alert alert-warning'>{{session('warning')}}</section>
          @endif  
        </div>
        <table class="table table-striped projects">
          <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Brand</th>
                <th>Featured</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
          </thead>
          <tbody>
            @foreach($products as $item)
            <tr>
              <td>
                @if ($item->image != null)
                <img src="{{ asset('/images/' . $item->image) }}" alt="{{ $item->image }}" style="width: 150px; height:100px;">
                @endif
              </td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->quantity }}</td>
              <td>{{ number_format($item->price, 0, '', '.') }}đ</td>
              <td>{{ $item->brand['name']}}</td>
              <td>
                @if ($item->featured)
                <span class="badge badge-success">Featured</span>
                @endif
              </td>
              <td>@if ($item->quantity == 0) <span class="badge badge-danger">Not Available</span> @else <span class="badge badge-success">Available</span> @endif</td>

              <td>
                <a href="{{ route('admin.product.edit', $item->id) }}" class="btn btn-primary">Update</a>
                {{-- <form style="display:inline-block" action="{{ route('admin.product.destroy', $item->id) }}" method="POST">
                  @method("DELETE")
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Are you sure to delete this product?')">Delete</button>
                </form> --}}
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection