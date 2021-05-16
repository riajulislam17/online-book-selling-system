@extends('layouts.theme')

@section('body')
    <div class="">
        <div class="h3 bg-light p-2 my-4">Seller List</div>
        <table class="table table-sm table-bordered" id="dataTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Shop</th>
                <th>Proprietor</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>shop image</th>
                <th>Last Update</th>
                <th>Joined</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sellers as $seller)
                <tr>
                    <td>{{ $seller->id }}</td>
                    <td>{{ $seller->shop_name }}</td>
                    <td>{{ $seller->proprietor_name }}</td>
                    <td>{{ $seller->email }}</td>
                    <td>{{ $seller->mobile }}</td>
                    <td>{{ $seller->address }}</td>
                    <td>{{ $seller->shop_image }}</td>
                    <td>{{ date('h:i:s a (d-M-y)', strtotime($seller->created_at)) }}</td>
                    <td>{{ date('h:i:s a (d-M-y)', strtotime($seller->updated_at)) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
