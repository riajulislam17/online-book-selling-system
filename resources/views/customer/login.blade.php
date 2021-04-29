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
           <ul class="nav nav-tabs">
               <li class="nav-item w-50">
                   <a class="nav-link active fw-bold text-center"
                      aria-current="page"
                      href="{{ route('auth.customer.login') }}">Customer</a>
               </li>
               <li class="nav-item w-50">
                   <a class="nav-link text-center fw-bold" href="{{ route('auth.seller.login') }}">Seller</a>
               </li>
           </ul>
           <div class="border shadow p-5">

               <div class="border-bottom font-weight-bold text-center h3 bg-light mb-4 py-2">
                   Customer Login
               </div>
               @if(Session::has('message'))
                   <p class="alert alert-info fw-bold">{{Session::get('message')}}</p>
               @endif
               <form action="{{ route('auth.customer.login') }}" method="post">
                   @csrf
                   <div class="input-group mb-4">
                       <div class="input-group-prepend">
                   <span class="input-group-text">
                       <i class="fa fa-mobile p-1"></i>
                   </span>
                       </div>
                       <input type="text"
                              name="mobile"
                              class="form-control @error('mobile') is-invalid @enderror"
                              placeholder="Mobile Number"
                              aria-label="mobile"
                              autocomplete="off"
                              aria-describedby="User-name">
                       @error('mobile')
                        <p class="fw-bold text-danger">{{ $message }}</p>
                       @enderror
                   </div>

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
                              aria-describedby="Password">
                       @error('password')
                        <p class="fw-bold text-danger"> {{ $message }} </p>
                       @enderror
                   </div>
                   <div class="d-flex justify-content-center flex-column align-items-center">
                       <button type="submit" class="btn btn-success w-25">Login <i class="fa fa-sign-in"></i></button>

                       <a href="{{ route('auth.customer.register') }}" class="mt-3">Register Now</a>
                   </div>

               </form>

           </div>
       </div>
    </div>
</body>
</html>
