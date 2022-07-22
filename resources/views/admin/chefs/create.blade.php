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
        width: 50%;
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
</style>


@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add New Cheff</h4>
        <form class="forms-sample" action="{{ route('add-cheff') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Name *</label>
                        <input type="text" class="form-control " name="name" placeholder="Name">
                        @error('name')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Designation *</label>
                        <input type="text" class="form-control " name="designation" placeholder="Designation">
                        @error('designation')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Select Profile Image</label>
                        <input type="file" class="form-control imagefile" name="profileImage" onchange="readURL(this)" accept="image/gif, image/jpeg, image/png">
                        @error('profileImage')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="image-container parent" >
                        <h2 class="text-center noimage">No Image Selected</h2>
                        <img id="blah" src="#" alt="slider image" class="child-right" style="display: none; object-fit:contain;" />
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
                $('.noimage').css('display', 'none');
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