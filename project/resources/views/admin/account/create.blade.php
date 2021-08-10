@extends('admin.layout.layout')

@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Admin</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    @if ($errors->any()) 
        <!--hiển thị thông báo lỗi-->  
        <div class="card">
            <div class="card-body">
                <ul class='error'>
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <!-- end - hiển thị thông báo lỗi-->  
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Create Admin Account</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
        <div class="card-body">
            <form action="{{ route('admin.account.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="confirm">Confirm</label>
                    <input type="password" id="confirm" name="confirm" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="role">Role</label>
                  <select name="role" id="" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                  </select>
                </div>
                <div style="max-width: 30%">
                  <div id="msg"></div>
                    <input type="file" name="image" class="file" >
                    <div class="input-group my-3">
                      <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                      <div class="input-group-append">
                        <button type="button" class="browse btn btn-primary">Upload Image</button>
                      </div>
                    </div>
                </div>

                <div style="max-width: 30%">
                  <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail" >
                </div>

                <div class="form-group">
                    <input type="submit" name="btnCreate" value="Create" class="btn btn-primary float-right"/>
                </div> <br>
            </form>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection

@section('admin-scripts')
    <script>
      $(document).on("click", ".browse", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
      });
      $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
          // get loaded data and render thumbnail.
          document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
      });
    </script>
@endsection

@section('admin-css')
    <style>
      .file {
        visibility: hidden;
        position: absolute;
      }
    </style>
@endsection