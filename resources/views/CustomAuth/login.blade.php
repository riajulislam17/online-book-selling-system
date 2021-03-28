<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css')}}" rel="stylesheet" >

    <title>Hello, world!</title>
    <style>
        body{
            background-repeat: no-repeat, repeat;
        }
    </style>
</head>
<body>
<div class="d-flex justify-content-center flex-column align-items-center" style="min-height: 100vh;">
    <ul class="nav nav-tabs bg-light" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Admin</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Seller</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Customer</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="border shadow p-5 w-100">
                <form action="">
                    <h4>Admin Login</h4>
                    <hr>
                    <label for="user">Email Address</label>
                    <input type="text" name="email" id="user" class="form-control">
                    <br>
                    <label for="pass">pass</label>
                    <input type="password" class="form-control" id="pass" name="password">
                    <br>
                    <input type="submit" value="Login" class="btn btn-success align-self-center">
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="border shadow p-5 w-100">
                <form action="">
                    <h4>Seller Login</h4>
                    <hr>
                    <label for="user">Email Address</label>
                    <input type="text" name="email" id="user" class="form-control">
                    <br>
                    <label for="pass">pass</label>
                    <input type="password" class="form-control" id="pass" name="password">
                    <br>
                    <input type="submit" value="Login" class="btn btn-success align-self-center">
                </form>
            </div>

        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="border shadow p-5 w-100">
                <form action="">
                    <h4>Customer Login</h4>
                    <hr>
                    <label for="user">Email Address</label>
                    <input type="text" name="email" id="user" class="form-control">
                    <br>
                    <label for="pass">pass</label>
                    <input type="password" class="form-control" id="pass" name="password">
                    <br>
                    <input type="submit" value="Login" class="btn btn-success align-self-center">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="{{asset('bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js')}}"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
-->
</body>
</html>
