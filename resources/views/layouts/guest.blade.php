<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('bootstrap-5.0.0-beta1-dist/css/bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('fa/css/all.min.css') }}" rel="stylesheet"/>
    <title> @yield('title') | Name </title>
</head>
<body>
    <div class="">
        <header class="bg-light border-bottom p-2 mb-2">
          <div class="container">
              <div class="d-flex justify-content-between align-items-center">
                  <h3>
                      <a href="{{ route('customer.index') }}" class="text-decoration-none">{{ config('app.name') }}</a>
                  </h3>
                  <div class="">
                      @guest
                              Login
                      @endguest
                  </div>
              </div>
          </div>
        </header>
        <div class="row m-0 p-0">
            <div class="col-md-2">
                Side Bar
            </div>
            <div class="col-md-10">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
