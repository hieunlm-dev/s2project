@extends('admin.layout.layout')

@section('contents')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Admin Account</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Admin Account</li>
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
                        @foreach ($errors->all() as $err)
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
                <h3 class="card-title">Update Admin Account</h3>

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
                <form action="{{ route('admin.account.update', $account->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if (session()->get('user')->role == 'admin' && $account->role == 'user')
                        <div class="form-group">
                            <select name="role" id="" class="form-control">
                                <option value="user" selected="selected">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="username">Username *</label>
                            <input type="text" id="username" name="username" value="{{ $account->email }}" required class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <input type="password" id="password"  required name="password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="confirm">Confirm Password *</label>
                            <input type="password" id="confirm" required name="confirm" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="role">Role *</label>
                            <select name="role" class="form-control" id="role" required>
                                <option value="{{ $account->role }}" selected>{{ $account->role }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="text" id="email" name="email" required value="{{ $account->email }}"
                                class="form-control" />
                        </div>
                        <div style="max-width: 30%">
                            <div id="msg"></div>
                            <input type="file" name="image" class="file" value="{{ $account->image }}">
                            <div class="input-group my-3">
                                <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                                <div class="input-group-append">
                                    <button type="button" class="browse btn btn-primary">Upload Image</button>
                                </div>
                            </div>
                        </div>
                        {{-- @if ($account->image != null)
                        <h3>Current Image</h3>
                            <img src="{{ asset('/images/' . $account->image) }}" alt="{{ $account->image }}"
                                style="width: 200px; height:100px; ">
                        @endif --}}
                    @endif

                    <div><p>Fields with * require information</p></div>
                    <div class="form-group">
                        <input type="submit" name="btnCreate" value="Update" class="btn btn-primary float-right" />
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
