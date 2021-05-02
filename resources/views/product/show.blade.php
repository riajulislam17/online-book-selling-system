@extends('layouts.app')
@section('title')
    {{ $data->book_name }}
@endsection

@section('content')
    <div class="d-flex justify-content-center">
       <div class="">
           <div class="card" style="width: 600px">
               <div class="card-header">
                   <img src="{{ asset('images/'.$data->image) }}" alt="Product Image" style="width: 500px">
               </div>
               <div class="card-body">
                   <div class="h3 card-title text-capitalize">{{ $data->book_name }}</div>
                   <p>by <span class="text-info h5 text-capitalize">{{ $data->writer_name }}</span></p>
                   <div class="card-text my-2">Category: <span class="fw-bold text-capitalize h6 px-1">{{$data->Category->category_name}}</span></div>
                   <span class="card-text" style="text-decoration: line-through;">TK. {{$data->price + 15}}</span>
                   <div class="card-text">
                       <span class="h5"> Tk. {{$data->price}} </span> <span class="text-info">You Save Tk. 15 (10%)</span>
                   </div>
                   <div class="card-title my-3">
                       @if(!$data->stock == 0)
                           <i class="fa fa-check-circle text-success"></i> In stock
                       @else
                           <h4 class="text-danger">Out Of Stock</h4>
                       @endif
                   </div>
                   <div class="card-text">
                       <p>{{ $data->description }}</p>
                   </div>
               </div>
           </div>
           <a href="{{ route('homePage') }}" class="btn btn-secondary my-3"> <i class="fa fa-arrow-left"></i> Go Back</a>
       </div>
    </div>
@endsection
