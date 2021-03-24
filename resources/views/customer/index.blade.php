<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To {{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{asset('bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css')}}">
    <script type="text/javascript" href="{{asset('bootstrap-5.0.0-beta1-dist/js/bootstrap.min.js')}}"></script>
</head>
<body>
    <div class="">
        <div class="">
            Slide Show
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
</body>

</html>
