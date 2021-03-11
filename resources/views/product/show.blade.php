@extends('layouts.theme')
@section('title')
    {{ $data->book_name }}
@endsection
    @section('page_name')
        {{ $data->book_name }}
        @endsection
@section('body')
    <div>
        <table class="table table-bordered table-sm w-50">
            <tr>
                <td>Name</td>
                <td>{{ $data->book_name  }}</td>
            </tr>
            <tr>
                <td>Publisher</td>
                <td>{{ $data->publisher_name  }}</td>
            </tr>
            <tr>
                <td>Writer</td>
                <td>{{ $data->writer_name  }}</td>
            </tr>
            <tr>
                <td>Stock</td>
                <td>{{ $data->stock  }}</td>
            </tr>
            <tr>
                <td>Price</td>
                <td>{{ $data->price  }}</td>
            </tr>
            <tr>
                <td>Category</td>
                <td>{{ $data->category_id  }}</td>
            </tr>
            <tr>
                <td>Details</td>
                <td>{{ $data->description  }}</td>
            </tr>
            <tr>
                <td>image</td>
                <td>
                    <img src="{{asset('images/'.$data->image)}}" alt="" style="width: 300px; height: 200px;">
                   </td>
            </tr>

        </table>
    </div>
@endsection
