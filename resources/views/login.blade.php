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
                   <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
               </div>

               <div class="input-group mb-4">
                   <div class="input-group-prepend">
                   <span class="input-group-text">
                       <i class="fa fa-key p-1"></i>
                   </span>
                   </div>
                   <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
               </div>
               <div class="d-flex justify-content-center">
                   <button class="btn btn-success w-25">Login</button>
               </div>

           </div>

       </div>
    </div>
</body>
</html>
