<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            body{
                width: 1024px;
                margin:0 auto;
            }
            .goods-name{
                font-weight: bold;
                color: green;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="center-block">
        @include('layouts.navi')
        </div>
        <div class="center-block">
        @yield('content')
        </div>
    </div>   
    </body>
    <script src="https://cdn.bootcss.com/jquery/1.12.3/jquery.js"></script>
    <script src="https://cdn.bootcss.com/socket.io/2.0.3/socket.io.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
