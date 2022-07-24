@extends('admin.layouts.default')

@section('content')
<style>
    .parent {
        overflow: hidden;
        position: relative;
        width: 100%;
        padding: 5px;
        height: 150px;
    }
    .child-right {
        height: 100%;
        margin-left: auto;
        margin-right: auto;       
        width: 100%;
    }
    .image-container{
        border: 1px solid gray; 
        height: 150px;
        border-radius: 5px;
    }
    .delete-class{
        color: red;
        font-weight: bold;
    }
    
</style>
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update Profile</h4>
        <form class="forms-sample" action="{{ route('update-settings',['id' => $settings['id']]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-5">
                <div class="col-md-6">
                    <label for="exampleInputName1">Facebook Link *</label>
                    <input type="text" value="{{ $settings['social'][0] }}"  name="social[]" class="form-control" placeholder="Name">
                    @error('name')
                    <small class="delete-class">{{ $message }}</small>
                @enderror
                </div>
                <div class="col-md-6">
                    <label for="exampleInputName1">Instagram Link * </label>
                    <input type="text" value="{{ $settings['social'][1] }}" name="social[]" class="form-control" placeholder="Email">
                    @error('email')
                    <small class="delete-class">{{ $message }}</small>
                @enderror
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6">
                    <label for="exampleInputName1">Twitter Link *</label>
                    <input type="text" value="{{ $settings['social'][2] }}" name="social[]" class="form-control" placeholder="Name">
                    @error('name')
                    <small class="delete-class">{{ $message }}</small>
                @enderror
                </div>
                <div class="col-md-6">
                    <label for="exampleInputName1">Linkedin Link * </label>
                    <input type="text" value="{{ $settings['social'][3] }}" name="social[]" class="form-control" placeholder="Email">
                    @error('email')
                    <small class="delete-class">{{ $message }}</small>
                @enderror
                </div>
            </div>
            
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Footer Text</label>
                        <input type="text" value="{{ $settings['footer_text'] }}" class="form-control" placeholder="Footer Text" name="footertext" >
                        @error('footertext')
                            <small >{{ $message }}</small>
                        @enderror
                      </div>
                </div>                
            </div>
            
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Logo</label>
                        <input type="file" class="form-control imagefile" name="logo" onchange="readURL(this)" accept="image/gif, image/jpeg, image/png">
                        @error('logo')
                            <small >{{ $message }}</small>
                        @enderror
                      </div>
                </div>
                <div class="col-md-4">
                    <div class="image-container parent" >
                        <img id="blah" src="{{ asset('images/settings/'.$settings['logo']) }}" alt="Select Logo" class="child-right" style=" object-fit:contain;" />
                    </div>

                </div>
            </div>
        
          <button type="submit" id="submit_button" class="btn btn-primary me-2">Create User</button>
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
    $(document).ready(function(){
        $('#password_confirm, #password').on('keyup', function(){
            var password = $('#password').val();
            var password_c = $('#password_confirm').val();
            $('#password').css('border-color', 'red');
            $('#password_confirm').css('border-color', 'red');
            $('#submit_button').prop('disabled', true);
            var res =  checkPassword(password, password_c)
            if(res){
                $('#password').css('border-color', 'green');
                $('#password_confirm').css('border-color', 'green');
                $('#submit_button').prop('disabled', false);
            }
           
        });
    });    

    function checkPassword(pass1, pass2){
        if(pass1 != pass2){
            return false;
        }else{
            return true;
        }
    }
</script>

@endsection