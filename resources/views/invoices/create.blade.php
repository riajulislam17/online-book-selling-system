@extends('layouts.theme')
@section('title')
ORDER
@endsection

@section('body')
    <div>
        <div class="">
            <div class="h3 bg-light py-3">Place Order</div>
            @if(Session::has('message'))
                <p> {{ Session::get('message') }}</p>
            @endif
        </div>
        <table class="table table-borderless table-sm">
            <tr>
                <td>Name</td>
                <td>{{$product->book_name}}</td>
            </tr>
            <tr>
                <td>Publisher</td>
                <td>{{$product->publisher_name}}</td>
            </tr>
            <tr>
                <td>Writer</td>
                <td>{{$product->writer_name}}</td>
            </tr>
            <tr>
                <td>Price</td>
                <td id="price">{{$product->price}}</td>
            </tr>
            <tr>
                <td>Total Price</td>
                <td id="totalPrice">{{$product->price}}</td>
            </tr>
        </table>
        <form action="{{ route('invoices.store', $product->id) }}" method="post">
            @csrf
            <div class="">
                <label for="product_count">
                    How many:
                </label>
                <input type="number" name="product_count" id="product_count" value="1" onkeyup="calculatePrice()" min="1">
            </div>
            <div class="">
                <label for="address">
                    Delivery Address
                </label>
                <input type="text" name="address" id="address" value="{{$address}}">
            </div>
            <div class="">
                <label for="address">
                    Payment Getaway
                </label>
                <select name="getaway" id="getaway">
                    <option value="bkash">bKash</option>
                    <option value="cash_in_delivery">Cash In Delivery</option>
                </select>
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-success">Confirm Order <i class="fa fa-check-circle"></i></button>
            </div>
        </form>
    </div>

@endsection
