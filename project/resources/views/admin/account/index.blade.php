@extends('admin.layout.layout')

@section('contents')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin Management</h1>
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

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Admin Accounts</h3>

                <div class="card-tools">
                    <a href="{{ route('admin.account.create') }}"><i class="fas fa-user-plus"></i></a>
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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $item)
                            <tr>
                                <td>
                                    @if ($item->image != null)
                                        <img src="{{ asset('/images/' . $item->image) }}" alt="{{ $item->image }}"
                                            style="width: 50px; height:50px; border-radius:50%">
                                    @endif
                                </td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                {{-- Nếu đang đăng nhập vào account admin nào thì chỉ chỉnh sửa được account của admin đó --}}
                                @if (session()->get('user')->username == $item->username)
                                    <td>
                                        <a href="{{ route('admin.account.edit', $item->id) }}"
                                            class="btn btn-primary">Update</a>
                                    </td>
                                @endif
                                {{-- Tài khoản admin chỉ được xóa hoặc update role cho tài khoản user , --}}
                                @if (session()->get('user')->role == 'admin' && session()->get('user')->username != $item->username)

                                    <td>
                                        <a href="{{ route('admin.account.edit', $item->id) }}"
                                            class="btn btn-primary">Update Role</a>
                                        <form style="display:inline-block"
                                            action="{{ route('admin.account.destroy', $item->id) }}" method="POST">
                                            @method("DELETE")
                                            @csrf
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                @endif
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
