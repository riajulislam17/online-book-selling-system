@extends('layouts.theme')

@section('body')
    <div class="">
        <div class="h3 bg-light p-2 my-4">Product List</div>
        <table class="table table-sm table-bordered" id="dataTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Seller</th>
                <th>Publisher</th>
                <th>Writer</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Category</th>
                <th>Description</th>
                <th>Joined</th>
                <th>Update</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->book_name }}</td>
                    <td>
                        <a href="" class="">{{ $product->seller->shop_name }}</a>
                       (<small>{{ $product->seller->proprietor_name }} </small>)
                    </td>
                    <td>{{ $product->publisher_name }}</td>
                    <td>{{ $product->writer_name }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->Category->category_name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ date('h:i:s a (d-M-y)', strtotime($product->created_at)) }}</td>
                    <td>{{ date('h:i:s a (d-M-y)', strtotime($product->updated_at)) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
