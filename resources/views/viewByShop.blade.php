@extends('layouts.app')
@section('content')
    <div class="">
        <div class="container">
            @foreach ($products as $user)
               <div class="shadow border p-3 m-3">
                   {{ $user->book_name }}
               </div>
            @endforeach
        </div>

        {{ count($products) }}
    </div>
@endsection
