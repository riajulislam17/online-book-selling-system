<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To {{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css' )}}">
    <link rel="stylesheet" href="{{ asset('fa/css/all.min.css' )}}">
    <script type="text/javascript" href="{{ asset('bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.js' )}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>

    <script type="text/javascript" href="{{ asset('bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js' )}}"></script>
    <style>
        .custom-price{
            font-size: 20px;
            transition: font-size 1s;
        }
        .custom-price:hover{
            font-size: 25px;
        }
        .custom-img{
            transition: all 1s;

        }
        .custom-img:hover{

            transform-style: preserve-3d;
            transform: rotateY(20deg);

        }
        .base{
            perspective-origin: left;
        }
    </style>
</head>
<body>
    <div class="">
        <div class="bg-light border-bottom p-2">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="h3">{{ config('app.name') }}</div>
                <div class="">
                   @auth
                        <a href="{{route('customer.login')}}" class="text-decoration-none fw-bold">Profile</a>
                    @endauth
                   @guest
                           <a href="{{route('customer.login')}}">Login</a>
                   @endguest
                </div>
            </div>
        </div>
        <div class="container">
            @if(count($products) > 0)
                <div class="d-flex justify-content-start">
                @foreach($products as $item)
                    <div class="card m-3" style="width: 18rem;">
                        <div class="base">
                            <img class="card-img-top custom-img" style="height: 250px;"  src="{{asset('images/'.$item->image)}}" alt="Card image cap" onclick="window.location='{{ route('book.show', $item->id) }}'">
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <a href="{{ route('book.show', $item->id) }}" class="text-decoration-none text-capitalize text-success h4 fw-bold">{{ $item->book_name }}</a>
                            </div>
                            <div class="card-text">By <span class="text-info h4">{{ $item->writer_name  }}</span></div>
                            <div class="fw-bold custom-price"> {{ $item->price }} &#2547; </div>
                            <p class="card-text">Publisher: {{ $item->publisher_name  }}</p>
                            @if(strlen($item->description) > 71)
                                <p class="card-text bg-light"> {{ substr($item->description,0,70) }} ...</p>
                            @else
                                <p class="card-text"> {{ $item->description }}</p>
                            @endif
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Post at {{ date('d-m-y', strtotime($item->created_at)) }}
                                <small class="text-info">({{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }})</small>
                            </li>
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
