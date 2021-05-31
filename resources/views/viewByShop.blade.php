@extends('layouts.app')
@section('content')
    <div class="">
        <div class="container">
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
                                    <a href="{{ route('invoices.create', $item->id) }}" class="card-link">Buy Now</a>
                                    <a href="{{ route('cart.add', $item->id) }}" class="card-link">add to Card</a>
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


    </div>
@endsection
