@extends('layouts.theme')

@section('body')
    <div class="">
        <div class="h3 bg-light p-2 ">Order List</div>
        <table class="table table-bordered table-sm table-responsive-md" id="dataTable">
            <thead>
            <tr>
                <th>#</th>
                <th>seller</th>
                <th>Customer</th>
                <th>Count</th>
                <th>Price</th>
                <th>Total</th>
                <th>Payment</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        <a href="" class="">{{ $order->seller->shop_name }}</a>
                        <small>({{ $order->seller->proprietor_name }})</small> </td>
                    <td>
                        <a href="" class="text-decoration-none">{{ $order->customer->first_name}} {{ $order->customer->last_name}}</a>
                    </td>
                    <td>{{ $order->product_count }}X</td>
                    <td>{{ $order->product_price }}Tk</td>
                    <td>{{ round($order->product_price * $order->product_count) }}Tk</td>
                    <td>{{ $order->getaway }}</td>
                    <td>{{ $order->address }}</td>
                    <td title="{{ date('d-M-y h:i:s a', strtotime($order->created_at)) }}">{{ date('d-M-y', strtotime($order->created_at)) }}</td>
                    <td title="{{ date('d-M-y h:i:s a', strtotime($order->updated_at)) }}">{{ date('d-M-y', strtotime($order->updated_at)) }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
