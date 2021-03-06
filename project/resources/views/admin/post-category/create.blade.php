@extends('admin.layout.layout')

@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Post Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Post Category</li>
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
        <h3 class="card-title">Create Post Category</h3>

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
        <form action="{{ route('admin.post-category.store') }}" method="POST" >
            @csrf
            <div class="container">
            <div class="row">
              <div class="col-sm-5">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control"/>
                </div>
              </div>
              <div class="col-sm-5">
                  <div class="form-group">
                      <label for="name">Slug</label>
                      <input type="text" id="slug" name="slug" class="form-control"/>
                  </div>
              </div>
              <div class="col-sm-5">
                <div class="form-group">
                    <label for="name">Sort</label>
                    <input type="text" id="sort" name="sort" class="form-control"/>
                </div>
            </div>
          </div>

          <div class="form-group">
            <input type="submit" name="btnCreate" value="Create" class="btn btn-primary float-right"/>
          </div> <br>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection

