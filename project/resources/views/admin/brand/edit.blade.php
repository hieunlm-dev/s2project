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
        <h3 class="card-title">Update Brand</h3>

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
        <form action="{{ route('admin.brand.update',$brand->id) }}" method="POST" >
            @csrf
            @method('PUT')
            <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">ID</label>
                    <input type="text" id="id" name="id" value="{{ $brand->id }}" class="form-control"/>
                </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" id="name" name="name" value="{{ $brand->name }}"  class="form-control"/>
                  </div>
              </div>
          </div>

          <div class="form-group">
            <input type="submit" name="btnCreate" value="Update" class="btn btn-primary float-right"/>
          </div> <br>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection

