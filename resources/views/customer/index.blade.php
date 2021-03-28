<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To {{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{asset('bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css')}}">
    <script type="text/javascript" href="{{asset('bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>

    <script type="text/javascript" href="{{asset('bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js')}}"></script>
</head>
<body>
    <div class="">
        <div class="">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="http://placehold.it/750x150?text=1" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="http://placehold.it/750x150?text=2" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="http://placehold.it/750x150?text=3" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div>
            @if(!empty($products))
                <div class="d-flex justify-content-start">
                @foreach($products as $item)
                    <div class="card m-3" style="width: 18rem;">
                        <img class="card-img-top" style="width: auto; height: 250px;" src="{{asset('images/'.$item->image)}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $item->book_name  }} </h5>
                            <b> {{ $item->price }} 	&#2547; </b>
                            <p class="card-text"> {{ $item->description }}</p>
                        </div>
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item"> By {{ $item->writer_name  }} </li>
                            <li class="list-group-item"> {{ $item->publisher_name  }} </li>
                            <li class="list-group-item">Post@ {{ date('d-m-y', strtotime($item->created_at))  }} </li>
                        </ul>
                        <div class="card-body">
                            <a href="#" class="card-link">Buy Now</a>
                            <a href="#" class="card-link">Add to Card</a>
                        </div>
                    </div>
                @endforeach
                </div>
            @endif

        </div>
        <div>

        </div>
    </div>
    <script type="text/javascript" href="{{asset('bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>

    <script type="text/javascript" href="{{asset('bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js')}}"></script>
</body>

</html>
