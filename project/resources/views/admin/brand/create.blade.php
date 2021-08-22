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
        <h3 class="card-title">Create Brand</h3>

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
        <form action="{{ route('admin.brand.store') }}" method="POST" >
          @csrf
          <div class="container">
          <div class="row">
            {{-- <div class="col-sm-6">
              <div class="form-group">
                  <label for="name">ID *</label>
                  <input type="text" id="id" name="id" class="form-control" required />
              </div>
            </div> --}}
            <div class="col-sm-6">
              <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" id="name" name="name" required class="form-control"/>
              </div>
            </div>
          </div>
          <div><p><i>Field with * requires information</i></p></div>
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

