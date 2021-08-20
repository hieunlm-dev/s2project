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
                <h3 class="card-title"> Customer Management</h3>
                <div>
                    @if(session('alert'))              
                        <section class='alert alert-warning'>{{session('alert')}}</section>
                    @endif  
                </div>
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $item)
                            <tr>
                                <td>{{ $item->firstname }}</td>
                                <td>{{ $item->lastname }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <a href="{{ route('admin.customer.edit', $item->id) }}"
                                        class="btn btn-primary">Details</a>
                                    <form style="display:inline-block"
                                        action="{{ route('admin.customer.destroy', $item->id) }}" method="POST" onsubmit="return confirmDelete();">
                                        @method("DELETE")
                                        @csrf
                                        <button class="btn btn-danger " type="submit" >Delete</button>
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
        <script>
          function confirmDelete(){
             var result=false;
             if(confirm('Are you sure you want to delete')){
               result=true;
             }
             return result;
          }
            // $('.btn-danger').on('click', function(e) {
            //     e.preventDefault();
            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             Swal.fire(
            //                 'Deleted!',
            //                 'Your file has been deleted.',
            //                 'success'
            //             )
            //         }
            //     });
            // });
        </script>
    </section>
    <!-- /.content -->
@endsection
