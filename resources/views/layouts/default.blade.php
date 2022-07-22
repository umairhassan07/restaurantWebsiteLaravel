<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    @yield('extra-css')
    
</head>
    
<body>
    @include('flash::message')

    @include('includes.header')

    @yield('content')


@include('includes.footer');
@yield('footer-scripts');


</body>
</html>
