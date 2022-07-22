<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.includes.head')
    
    @yield('head-content')

    <style>
      .alert-class-style{
        z-index: 9999;
        width: 20%;
        position: fixed;
        border-radius: 2px; 
        top: 15px;
        right: 10px;
      }
    </style>

  </head>

  <body>



    <div class="container-scroller">
      @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-class-style text-center">
          <b><span style="font-size: 14px;"><i class="fa fa-check-circle" aria-hidden="true"></i>  {{ Session::get('message'); }}</span> </b>
        </div>
      @endif

        @include('admin.includes.topnav')

        <div class="container-fluid page-body-wrapper">
            @include('admin.includes.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>

                @include('admin.includes.footer')
            </div>
            
        </div>

    </div>

   
    @include('admin.includes.bottom')
    @yield('footer-scripts')
  <script>
      $(document).ready(function(){
          $(".alert").fadeTo(4000, 500).slideUp(500, function(){
              $(".alert").slideUp(500);
          });
      });
  </script>

  </body>
</html>