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
    .alert-class{
        color: red;
        font-weight: bold;
    }
    .ck-editor__editable[role="textbox"] {
        min-height: 200px;
    }
</style>
@endsection




@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update About Us page</h4>
        <form class="forms-sample" action="{{ route('update-about-us') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputName1">Heading</label>
                        <input type="text" class="form-control" value="{{ $about['heading'] }}" placeholder="Heading..." name="heading" >
                        @error('heading')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                      </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputName1">Description</label>
                        <textarea class="form-control" name="description" id="editor">{{ $about['description']}}</textarea>
                        @error('description')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                      </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputName1">Video Link</label>
                        <input type="text" value="{{ $about['videoLink'] }}" class="form-control" name="videoLink">
                        @error('videoLink')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                      </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Image 1</label>
                        <input type="file" class="form-control imagefile" name="image1" onchange="img1function(this)" accept="image/gif, image/jpeg, image/png">
                        @error('image1')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="image-container parent" >
                        <img id="img1" src="{{ asset('images/about/'.$about['img1']) }}" alt="slider image" class="child-right" style="object-fit:contain;" />
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Image 2</label>
                        <input type="file" class="form-control imagefile" name="image2" onchange="img2function(this)" accept="image/gif, image/jpeg, image/png">
                        @error('image2')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="image-container parent" >
                        <img id="img2" src="{{ asset('images/about/'.$about['img2']) }}" alt="slider image" class="child-right" style="object-fit:contain;" />
                    </div>
                </div>
            </div>
            
            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Image 3</label>
                        <input type="file" class="form-control imagefile" name="image3" onchange="img3function(this)" accept="image/gif, image/jpeg, image/png">
                        @error('image3')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="image-container parent" >
                        <img id="img3" src="{{ asset('images/about/'.$about['img3']) }}" alt="slider image" class="child-right" style="object-fit:contain;" />
                    </div>
                </div>
            </div>
            
            <hr>
        
          <button type="submit" class="btn btn-primary me-2">Update</button>
          <a href="{{ route('about-us') }}" class="btn btn-light" >Back</a>
        </form>
      </div>
    </div>
  </div>
@endsection


@section('footer-scripts')
  <script>


    function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                $('#'+id).attr('src', e.target.result);
                $('#'+id).css('display', 'block');
                $('#'+id).css('width', '100%');
                };

                reader.readAsDataURL(input.files[0]);
            }
            }
      
        function img1function(input) {
            var id = 'img1';
            readURL(input, id);
        }

        function img2function(input) {
            var id = 'img2';
            readURL(input, id);
        }

        function img3function(input) {
            var id = 'img3';
            readURL(input, id);
        }

  </script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection