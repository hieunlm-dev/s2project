@extends('admin.layout.layout')

@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Brand</h1>
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
        <h3 class="card-title">Brand List</h3>

        <div class="card-tools">
          <a href="{{ route('admin.brand.create') }}"><i class="fas fa-plus"></i></i></i></a>
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
          
              <section class='alert alert-warning'>{{session('alert')}}</section>
          
          @endif  
        </div>
        
        <div>
            @if(session('success'))
          
              <section class='alert alert-success'>{{session('success')}}</section>
          
          @endif  
        </div>
        <table class="table table-striped projects">
          <thead>
              <tr>
                <th>Brand ID</th>
                <th>Brand Name</th>
                <th>Actions</th>
              </tr>
          </thead>
          <tbody>
            @foreach($brands as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->name }}</td>
              <td>
                <a href="{{ route('admin.brand.edit', $item->id) }}" class="btn btn-primary">Update</a>
                <form style="display:inline-block" action="{{ route('admin.brand.destroy', $item->id) }}" method="POST">
                  @method("DELETE")
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Are you sure to delete this Brand?')">Delete</button>
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