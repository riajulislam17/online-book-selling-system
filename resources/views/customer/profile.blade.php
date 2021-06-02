@extends('layouts.theme')
@section('title')
    {{$profileInfo->first_name}}
@endsection
@section('body')
    <div class="row m-0 p-0">
        <div class="col-md-10 mx-auto">
            <div class="row m-0 p-0">
                <div class="col-md-2 bg-light border py-2">
                    <div class="d-flex flex-column">
                        <img src="{{ asset('siteImage/img.png') }}" alt="">
                        <p class="text-center my-3"> {{$profileInfo->first_name}} {{$profileInfo->last_name}} <i class="fa fa-check-circle text-success"></i> </p>
                        <div class="">
                            <p class="border border-info p-2"> <i class="fa fa-user"></i> Basic Information </p>
                            <p class="p-2"> <i class="fa fa-list"></i> Order List </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 ml-3">
                    <div class="d-flex flex-row">
                        <i class="fa fa-info-circle mr-3" style="font-size: 60px; color: #0ecd8b"></i>
                        <div class="w-100" >
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h3 text-info text-uppercase">personal information</span>
                                <a href="{{ route('customer.profile.edit') }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                            <hr>
                            <table class="table table-borderless table-sm">
                                <tr>
                                    <td>First Name</td>
                                    <td>{{$profileInfo->first_name}} {{$profileInfo->last_name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <a class="text-decoration-none" href="mailto:{{$profileInfo->email}}">{{$profileInfo->email}}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mobile</td>
                                    <td>
                                        <a class="text-decoration-none" href="tel:{{$profileInfo->mobile}}">{{$profileInfo->mobile}}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>
                                        {{ $profileInfo->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Member Since</td>
                                    <td>{{ date('d-M-Y', strtotime($profileInfo->created_at)) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row mt-4">
                        <i class="fa fa-list mr-3" style="font-size: 55px; color: #0ecd8b"></i>
                        <div class="w-100" >
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h3 text-info text-uppercase">Order List</span>
                            </div>
                            <hr>
                            @if(count($orders) > 0)
                                <table class="table table-bordered table-sm" id="dataTable">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Shop</th>
                                        <th>Price</th>
                                        <th>Piece</th>
                                        <th>Total Price</th>
                                        <th>Payment</th>
                                        <th>Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->product->book_name }}</td>
                                            <td>{{ $order->seller['shop_name'] }}</td>
                                            <td>{{ $order->product_price }}</td>
                                            <td>{{ $order->product_count }} X</td>
                                            <td>{{ $order->total_price }}</td>
                                            <td>SSLCommerz (<small>{{ $order->order->status }}</small>)</td>
                                            <td>{{ date('d-M-Y', strtotime($order->created_at))  }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="">
                                    <div class="alert alert-info text-center fw-bold h5">
                                        No Order Found
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
