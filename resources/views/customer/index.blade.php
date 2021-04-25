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
                <div class="h3">Book Stall</div>
                <div class="">
                    @if(Auth::guard('seller')->check())
                           Hello,   <b>{{ Auth::guard('seller')->user()->proprietor_name }}</b>
                            &middot;
                           <a class="text-decoration-none" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                               {{ __('Logout') }}
                           </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                               @csrf
                           </form>
                       @elseif(Auth::guard('customer')->check())
                           Hello, <b>{{ Auth::guard('customer')->user()->first_name }}</b>
                        &middot;
                        <a class="text-decoration-none" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                       @elseif(Auth::check())
                        hello, unknown
                       @else
                           <b>Guest</b> &middot; <a href="{{ route('auth.customer.login') }}">Login</a>

                   @endif
                </div>
            </div>
        </div>
        <div class="container">
            <div class="">
                Check <br/>
                @auth('seller')
                    You ar seller <br>
                @endauth
                @auth
                    You ar Login <br>
                @endauth
            </div>
            @if(count($shops) > 0)
                @foreach($shops as $shop)
                    <div class="">
                       <i class="fa fa-shopping-basket"></i> {{ $shop->shop_name }}
                    </div>
                @endforeach

            @else
                <p class="alert alert-danger">No Shop Found</p>
            @endif
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
                            <div class="card-text">By <span class="text-info h5">{{ $item->writer_name  }}</span></div>
                            <div class="fw-bold custom-price"> {{ $item->price }} &#2547; </div>
{{--                            <p class="card-text">Publisher: {{ $item->publisher_name  }}</p>--}}
                            @if(strlen($item->description) > 71)
                                <p class="card-text bg-light"> {{ substr($item->description,0,70) }} ...</p>
                            @else
                                <p class="card-text"> {{ $item->description }}</p>
                            @endif
                        </div>
                        {{--<ul class="list-group list-group-flush">
                            <li class="list-group-item">Post at {{ date('d-m-y', strtotime($item->created_at)) }}
                                <small class="text-info">({{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }})</small>
                            </li>
                        </ul>--}}
                        <div class="card-body">
                            @if($item->stock == 0)
                                <p class="alert alert-danger h5">Out of Stock</p>
                            @else
                                <a href="#" class="card-link">Buy Now</a>
{{--                                <a href="#" class="card-link">Add to Card</a>--}}
                            @endif
                            @auth('seller')
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('book.edit', $item->id) }}">Edit</a>
                                    <a href="{{ route('book.destroy', $item->id) }}"
                                       onclick="bookDelete()"
                                    >Delete</a>
                                    <form id="delete_product" action="{{ route('book.destroy', $item->id) }}" method="POST" class="sr-only">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            @endauth
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
    <script>
        let bookDelete = () => {
            let deleteForm = document.getElementById('delete_product');
            event.preventDefault();
             if(confirm('Do you really want to submit the form?')){
                 deleteForm.submit();
             }

        }
    </script>
</body>

</html>
