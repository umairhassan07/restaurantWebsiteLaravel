@extends('admin.layouts.default')

@section('head-content')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<style>
    .btn-file {
    position: relative;
    overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    #img-upload{
        width: 100%;
        object-fit: contain;
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
        <h4 class="card-title">Update Meal</h4>
        <form class="forms-sample" id="meals" action="{{ route('update-meal', ['id' => $meal['id']]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="page_name" value="admin_page">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Name *</label>
                        <input type="text" class="form-control" value="{{ $meal['name'] }}" name="name" placeholder="Name">
                        @error('name')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Short Description *</label>
                        <textarea name="description" placeholder="short description" class="form-control">{{ $meal['description'] }}</textarea>
                        @error('description')
                            <small class="alert-class">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Upload Image</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    Browse… <input type="file" name="meal_image" id="imgInp">
                                </span>
                            </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        @error('meal_image')
                        <small class="alert-class">{{ $message }}</small>
                    @enderror
                        <img src="{{ asset('images/meals/'. $meal['image']) }}"  id='img-upload'/>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="price">Price</label>
                    <input type="number" name="price" value="{{ $meal['price'] }}" class="form-control" placeholder="Price">
                    @error('price')
                        <small class="alert-class">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="type">Type</label>
                    <select name="type" class="form-control" style="height:40px;">
                        <option value="0">Select Type</option>
                        <option value="breakfast" {{ ($meal['type'] == 'breakfast' || $meal['type'] == 'Breakfast' ) ? 'selected' : '' }} >BreakFast</option>
                        <option value="lunch" {{ ($meal['type'] == 'lunch' || $meal['type'] == 'lunch' ) ? 'selected' : '' }}>Lunch</option>
                        <option value="dinner" {{ ($meal['type'] == 'dinner' || $meal['type'] == 'dinner' ) ? 'selected' : '' }}>Dinner</option>
                    </select>
                    @error('type')
                        <small class="alert-class">{{ $message }}</small>
                    @enderror
                </div>
            </div>
           
            <hr>

          <button type="submit" class="btn btn-primary me-2">Upload</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('footer-scripts')
<script>
    $(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
                    $('#img-upload').css('height','300px');
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});
</script>
@endsection 