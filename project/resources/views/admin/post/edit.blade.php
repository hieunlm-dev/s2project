@extends('admin.layout.layout')

@section('contents')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Post</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Post</li>
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
        <h3 class="card-title">Create Post</h3>

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
        <form action="{{ route('admin.post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" id="title" name="title" value="{{ $post->title }}" class="form-control"/>
                    </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="brand">Category </label> <br>
                    <select class="form-control" name="category_id" id="category">         
                      @foreach ($categories as $item)
                        <option value=" {{$item->id}} "> {{$item->name}} </option>
                      @endforeach
                      
                    </select>     
                  </div>
                </div>
                
                <div class="col-sm-2">
                    <div class="form-group" style="text-align: center">
                        <label for="featured">Featured</label>
                        <input type="hidden" value="0" name="featured">   
                        <input type="checkbox" id="featured" name="featured" value="1" @if (isset($post->featured)) checked @endif class="form-control"/>
                        
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="desc">Content</label>
                <textarea id="contents" name="contents" class="form-control" value="{{ $post->contents }}"></textarea>
            </div>
            
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="desc">Author</label>
                  <input type="text" id="author" name="author" value="{{ $post->author }}" class="form-control"/>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="desc">Sort</label>
                  <input type="text" id="sort" name="sort" value="{{ $post->sort }}" class="form-control"/>
                </div>
              </div>
            </div>
            <div style="max-width: 30%">
              <div id="msg"></div>
                <input type="file" name="image" class="file" style="display: none;">
                <div class="input-group my-3">
                  <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                  <div class="input-group-append">
                    <button type="button" class="browse btn btn-primary">Upload Image</button>
                  </div>
                </div>
            </div>
            {{-- <div style="max-width: 30%">
              <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail" >
            </div> --}}

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

@section('admin-scripts')

    <script src="{{asset('dist/ckeditor/ckeditor.js')}}"></script>

    <script>
      // let prefix_url = {{route('home')}};
      var options = {
        filebrowserImageBrowseUrl:  '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl:  '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl:  '/laravel-filemanager?type=Files',
        filebrowserUploadUrl:  '/laravel-filemanager/upload?type=Files&_token='
      };
      CKEDITOR.replace('contents',options)
    </script>

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