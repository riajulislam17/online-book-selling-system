<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('bootstrap-5.0.0-beta1-dist/css/bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('fa/css/all.css') }}" rel="stylesheet"/>
    <title>Login Page</title>
</head>
<body>
    <div class="d-flex justify-content-center flex-column" style="min-height: 100vh">
       <div class="w-25 mx-auto">
           <div class="">
               @if(Session::has('message'))
                   <p class="alert alert-success font-weight-bold">{{ Session::get('message') }}</p>
               @endif
           </div>
           <form action="{{route('auth.seller.login')}}" method="post">
               @csrf
               <div class="border shadow p-5">
                   <div class="border-bottom font-weight-bold text-center h3 bg-light mb-4">
                       Login
                   </div>
                   <div class="input-group mb-4">
                       <div class="input-group-prepend">
                   <span class="input-group-text">
                       <i class="fa fa-user p-1"></i>
                   </span>
                       </div>
                       <input type="text"
                              name="email"
                              class="form-control @error('email') is-invalid @enderror"
                              placeholder="email"
                              aria-label="email"
                              value="{{ old('email') }}"
                              aria-describedby="basic-email">
                   </div>
                       @error('email')
                       <small class="fw-bold text-danger">{{ $message }}</small>
                       @enderror

                   <div class="input-group mb-4">
                       <div class="input-group-prepend">
                   <span class="input-group-text">
                       <i class="fa fa-key p-1"></i>
                   </span>
                       </div>
                       <input type="password"
                              name="password"
                              class="form-control @error('password') is-invalid @enderror"
                              placeholder="Password"
                              aria-label="Password"
                              aria-describedby="basic-addon2">
                   </div>
                       @error('email')
                       <small class="fw-bold text-danger">{{ $message }}</small>
                       @enderror
                   <div class="d-flex justify-content-center">
                       <button class="btn btn-success w-25">Login</button>
                   </div>

               </div>
           </form>

       </div>
    </div>
</body>
</html>
