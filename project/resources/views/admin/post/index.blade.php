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
            <li class="breadcrumb-item active">Blog Post</li>
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
        <h3 class="card-title">Post List</h3>

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
                <th>Image</th>
                <th>Title</th>
                <th>Featured</th>
                <th>Category</th>
                <th>Sort</th>
                <th>Actions</th>
              </tr>
          </thead>
          <tbody>
            @foreach($posts as $item)
            <tr>
              <td>
                @if ($item->image != null)
                <img src="{{ asset('/images/' . $item->image) }}" alt="{{ $item->image }}" style="width: 150px; height:100px;">
                @endif
              </td>
              <td>{{ $item->title }}</td>
              <td>
                @if ($item->featured)
                <span class="badge badge-success">Featured</span>
                @endif
              </td>
              <td>{{ $item->category->name }}</td>
              <td>{{ $item->sort }}</td>
              <td>
                <a href="{{ route('admin.product.edit', $item->id) }}" class="btn btn-primary">Update</a>
                <form style="display:inline-block" action="{{ route('admin.product.destroy', $item->id) }}" method="POST">
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
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection