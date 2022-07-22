@extends('admin.layouts.default')

@section('content')
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
    .delete-button{
        position: absolute;
        left: 0;
        top: 0;
    }
</style>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update Slider</h4>
        <form class="forms-sample" action="{{ route('update-slider') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$slider->id}}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Choose Slider Image</label>
                        <input type="file" class="form-control imagefile" name="sliderImage" onchange="readURL(this)" accept="image/gif, image/jpeg, image/png">
                        @error('sliderImage')
                            <small>{{ $message }}</small>
                        @enderror
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="image-container parent" >
                        <img id="blah" src="{{ asset('images/sliders/'.$slider->image) }}" alt="slider image" class="child-right" style="object-fit:contain;" />
                    </div>

                </div>
            </div>
        
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

@endsection