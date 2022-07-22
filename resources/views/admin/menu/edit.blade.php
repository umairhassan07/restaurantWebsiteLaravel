@extends('admin.layouts.default')

@section('head-content')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

<style>
    .parent {
        overflow: hidden;
        position: relative;
        width: 100%;
        padding: 5px;
    }
    .child-right {
        height: 100%;
        margin-left: auto;
        margin-right: auto;       
        width: 100%;
    }
    .image-container{
        border: 1px solid gray; 
        height: 300px;
        border-radius: 5px;
    }
    .ck-editor__editable[role="textbox"] {
        min-height: 200px;
    }
    .alert-class{
        color: red;
        font-weight: bold;
    }
</style>


@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update Menu Item</h4>
        <form class="forms-sample" action="{{ route('update-menu',['id'=> $menu['id']]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Title *</label>
                        <input type="text" class="form-control" value="{{ $menu['title'] }}" name="title" placeholder="title">
                        @error('title')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Price *</label>
                        <input type="number" value="{{ $menu['price'] }}" class="form-control " name="price" placeholder="price">
                        @error('price')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <label for="exampleInputName1">Description *</label>
                    <textarea name="description" id="description" class="form-control">{!! $menu['description'] !!}</textarea>
                    @error('description')
                        <small class="alert-class">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Choose Slider Image</label>
                        <input type="file" class="form-control imagefile" name="menuImage" onchange="readURL(this)" accept="image/gif, image/jpeg, image/png">
                        @error('menuImage')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image-container parent" >
                        <img id="blah" src="{{ asset('images/menu/'.$menu['image']) }}" alt="slider image" class="child-right" style="object-fit:contain;" />
                    </div>
                </div>
            </div><hr>
        
          <button type="submit" class="btn btn-primary me-2">Upload</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection


@section('footer-scripts')
  <script>
      
      function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
                $('#blah').css('display', 'block');
                $('#blah').css('width', '100%');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
  </script>

<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection