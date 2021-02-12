<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('bootstrap-5.0.0-beta1-dist/css/bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('fa/css/all.css') }}" rel="stylesheet"/>
    <title> @yield('title') | Name </title>
</head>
<body>
    <div class="row m-0 p-0">
        <div class="col-md-2">
            Side Bar
        </div>
        <div class="col-md-10">
            @yield('body')
        </div>
    </div>
</body>
</html>
