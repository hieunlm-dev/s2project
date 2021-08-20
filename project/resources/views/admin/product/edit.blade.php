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
            <li class="breadcrumb-item active">Product</li>
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
        <h3 class="card-title">Update Product</h3>

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
        <form action="{{ route('admin.product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" required value="{{ $product->name }}" class="form-control"/>
                    </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="brand">Brand </label> <br>
                    <select class="form-control" name="brand_id" id="brand_id" >         
                      @foreach ( $brands as $item )
                        <option value="{{ $item->id}}"> {{ $item->name}} </option>
                      @endforeach
                    </select>     
                  </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group" style="text-align: center">
                        <label for="featured">Featured</label>
                        <input type="checkbox" id="featured" name="featured" value="1" class="form-control" @if (isset($product->featured)) checked @endif/>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="desc">Description *</label>
                <textarea id="desc" name="desc" required value="" class="form-control">{{ $product->desc }}</textarea>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="quantity">Quantity *</label>
                        <input type="text" id="quantity" name="quantity" required value="{{ $product->quantity }}" class="form-control"/>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="price">Price *</label>
                        <input type="text" id="price" name="price" required value="{{ $product->price }}" class="form-control"/>
                    </div>
                </div>
            </div>
            
            <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="quantity">System</label>
                      <input type="text" id="system" name="system" value="{{ $product->system }}" class="form-control"/>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="price">Ram</label>
                      <input type="text" id="ram" name="ram" value="{{ $product->ram }}" class="form-control"/>
                  </div>
              </div>
            </div>  

            <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="quantity">Storage</label>
                      <input type="text" id="storage" name="storage" value="{{ $product->storage }}" class="form-control"/>
                  </div>
              </div>
              <div class="col-sm-6">
                  <div class="form-group">
                      <label for="price">Battery</label>
                      <input type="text" id="battery" name="battery" value="{{ $product->battery }}" class="form-control"/>
                  </div>
              </div>
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
            
            <div><p><i>Field with * requires information</i></p></div>
            
            <div class="form-group">
                <input type="submit" name="btnCreate" value="Update" class="btn btn-primary float-right"/>
            </div> <br>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection

@section('admin-css')
    <style>
      #img{
        display: flex;
        justify-content:space-between; 
      }
    </style>
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