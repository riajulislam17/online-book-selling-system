@extends('layouts.theme')
@section('title')
    Post List
@endsection
@section('page_name')
    Post List
@endsection
@section('body')
    <div class="w-75 border p-4 shadow">
        <div class="d-flex justify-content-between">
            <div class="h4">Book List</div>
            <div class=""><a href="{{route('book.create')}}" class="float-end"> <i class="fa fa-plus"></i> Add </a></div>
        </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Book Name</th>
                <th>Publisher</th>
                <th>Writer</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $index => $item)
                <tr>
                    <td> {{ $item->id  }} </td>
                    <td>
                        <a href="{{ route('book.show', $item->id) }}" class="text-decoration-none text-capitalize">{{ $item->book_name  }}</a>
                    </td>
                    <td> {{ $item->publisher_name  }} </td>
                    <td> {{ $item->writer_name  }} </td>
                    <td> {{ $item->stock  }} </td>
                    <td> {{ $item->price  }} </td>
                    <td>
                        <a href="{{ route('book.edit', $item->id) }}" class="float-right">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{route('book.destroy', $item->id)}}" method="post" onsubmit="return confirm('Do you really want to submit the form?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
