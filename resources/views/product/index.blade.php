@extends('layout.login')
@section('title')
    Post List
    @endsection
@section('body')
    <div class="w-75 border p-4 shadow">
        <div class="h3"> posted book list <a href="{{route('book.create')}}" class="float-end"> <i class="fa fa-plus"></i> Add </a> </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Book Name</th>
                <th>Publisher</th>
                <th>Writer</th>
                <th>Stock</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $index => $item)
                <tr>
                    <td> {{ $item->id  }} </td>
                    <td> {{ $item->book_name  }} </td>
                    <td> {{ $item->publisher_name  }} </td>
                    <td> {{ $item->writer_name  }} </td>
                    <td> {{ $item->stock  }} </td>
                    <td> {{ $item->price  }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
