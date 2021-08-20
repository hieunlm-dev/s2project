@extends('admin.layout.layout')

@section('contents')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Account</li>
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
                <h3 class="card-title">Customer Detail</h3>

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
                <div class="form-group">
                    <label for="username">First Name</label>
                    <input type="text" id="username" name="username" value="{{ $customer->firstname }}"
                        class="form-control" readonly />
                </div>
                <div class="form-group">
                    <label for="username">Last Name</label>
                    <input type="text" id="username" name="username" value="{{ $customer->lastname }}"
                        class="form-control" readonly />
                </div>
                <div class="form-group">
                    <label for="confirm">Email</label>
                    <input type="text" id="confirm" name="confirm" class="form-control" value="{{ $customer->email }}"
                        readonly />
                </div>
                <div class="form-group">
                    <label for="email">Phone</label>
                    <input type="text" id="email" name="email" value="{{ $customer->phone }}" class="form-control"
                        readonly />
                </div>
                <div class="form-group">
                    <label for="email">Address</label>
                    <input type="text" id="email" name="email" value="{{ $customer->address }}" class="form-control"
                        readonly />
                </div>
                
            </div>
        </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
{{-- @section('admin-scripts')
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
@endsection --}}
