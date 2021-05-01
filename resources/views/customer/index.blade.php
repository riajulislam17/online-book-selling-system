<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kurale&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css' )}}">
    <link rel="stylesheet" href="{{ asset('fa/css/all.min.css' )}}">
    <script src="{{ asset('bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.min.js') }}"></script>
    <style>
        *{
            font-family: 'Kurale', serif;
        }
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
        <div class="bg-light border-bottom p-2 py-3">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="h3 text-primary fw-bold">{{ config('app.name') }}</div>
                <div class="w-50">
                   <div class="input-group">
                       <input type="text"
                              class="form-control"
                              aria-label="search"
                              placeholder="Search something"
                              aria-describedby="search">
                       <div class="input-group-prepend">
                           <div class="input-group-text" id="search">
                               <i class="fa fa-search p-1"></i>
                           </div>
                       </div>
                   </div>
                </div>

               <div>
                   <div class="dropdown">
                       <a class="dropdown-toggle text-decoration-none"
                          href="#" role="button"
                          id="dropdownMenuLink"
                          data-bs-toggle="dropdown"
                          aria-expanded="false">
                           <i class="fa fa-user"></i>
                       </a>
                       <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                           @if(Auth::guard('seller')->check())
                                <li>
                                    <a href="{{ route('seller.profile') }}" class="text-decoration-none dropdown-item" title="Profile">
                                        {{ Auth::guard('seller')->user()->proprietor_name }} (profile)
                                    </a>
                                </li>
                               <li>
                                   <a class="text-decoration-none dropdown-item" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       {{ __('Logout') }}
                                   </a>
                               </li>
                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                   @csrf
                               </form>
                           @elseif(Auth::guard('customer')->check())
                               <li>
                                   <a href="{{ route('customer.profile') }}" title="Profile" class="text-decoration-none dropdown-item">
                                       {{ Auth::guard('customer')->user()->first_name }}
                                   </a>
                               </li>
                               <li>
                                   <a class="text-decoration-none dropdown-item" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       {{ __('Logout') }}
                                   </a>
                               </li>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                   @csrf
                               </form>
                           @elseif(Auth::check())
                               <li>
                                   <a class="text-decoration-none" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       {{ __('Logout') }}
                                   </a>
                               </li>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                   @csrf
                               </form>
                           @else
                              <li>
                                  <a href="{{ route('auth.customer.register') }}" class="dropdown-item">Sign Up</a>
                              </li>
                              <li>
                                  <a href="{{ route('auth.customer.login') }}" class="dropdown-item">Sign In</a>
                              </li>

                           @endif
                       </ul>
                   </div>
               </div>
            </div>
        </div>
        <div class="">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <img src="{{ asset('siteImage/img_1.png') }}" style="height: 35vh;" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="{{ asset('siteImage/img_2.png') }}" style="height: 35vh;" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('siteImage/img_3.png') }}" style="height: 35vh;" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            {{--body--}}
            {{--slider--}}

            @if(count($shops) > 0)
                <div class="h3 mt-4 p-3 bg-light">
                    Brows by shop
                </div>
                <div class="d-flex flex-wrap">
                    @foreach($shops as $shop)
                        <div class="card m-3" style="width: 18rem;">
                            <div class="card-header">
                                @if(strlen($shop->shop_image) < 0)
                                    <img class="card-img-top custom-img" style="height: 250px;"  src="{{ asset($shop->shop_image) }}" alt="Shop Image">
                                @else
                                    <img class="card-img-top custom-img" style="height: 250px;"  src="{{ asset('siteImage/shop_default_image.png') }}" alt="">
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="h4 fw-bold">
                                    {{ $shop->shop_name }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="alert alert-danger">No Shop Found</p>
            @endif

            <div class="h3 mt-4 p-3 bg-light">New Arrival ---</div>
            @if(count($products) > 0)
                <div class="d-flex flex-wrap">
                @foreach($products as $item)
                    <div class="card m-3" style="width: 18rem;">
                        <div class="base">
                            <img class="card-img-top custom-img" style="height: 250px;"  src="{{asset('images/'.$item->image)}}" alt="Card image cap" onclick="window.location='{{ route('product.show', $item->id) }}'">
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                <a href="{{ route('product.show', $item->id) }}" class="text-decoration-none text-capitalize text-success h4 fw-bold">{{ $item->book_name }}</a>
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
                                <a href="{{ route('order.create', $item->id) }}" class="card-link">Buy Now</a>
                            @endif

                            @auth('seller')
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('product.edit', $item->id) }}" class="btn btn-secondary"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('product.destroy', $item->id) }}" class="btn btn-danger"
                                       onclick="bookDelete()"
                                    > <i class="fa fa-trash"></i></a>
                                    <form id="delete_product" action="{{ route('product.destroy', $item->id) }}" method="POST" class="sr-only">
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
