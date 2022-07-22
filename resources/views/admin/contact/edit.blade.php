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
        <h4 class="card-title">Update Contact-us page</h4>
        <form class="forms-sample" action="{{ route('update-contact') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputName1">Contact page Heading</label>
                        <input type="text" class="form-control" value="{{ $contact['heading'] }}" placeholder="Heading..." name="heading" >
                        @error('heading')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                      </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputName1">Description</label>
                        <textarea class="form-control" name="description" id="editor">{!! $contact['description'] !!}</textarea>
                        @error('description')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                      </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Phone Number</label>
                        <input type="number" class="form-control" value="{{ $contact['phone1'] }}" name="phone" placeholder="Phone Number">
                        @error('phone')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Seoond Number</label>
                        <input type="number" class="form-control" value="{{ $contact['phone2'] }}" name="phone2" placeholder="Second Number">
                        @error('phone2')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                      </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Email Address</label>
                        <input type="email" class="form-control" value="{{ $contact['email1'] }}" name="email" placeholder="Email Address">
                        @error('email')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Second Email Address</label>
                        <input type="email" class="form-control" value="{{ $contact['email2'] }}" name="email2" placeholder="Second Email Address">
                        @error('email2')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
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
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection