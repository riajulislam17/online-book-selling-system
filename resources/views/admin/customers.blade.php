@extends('layouts.theme')

@section('body')
    <div class="">
        <div class="bg-light p-2 my-4 h3">Customer List</div>
        <table class="table table-bordered table-sm" id="dataTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Joined at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->first_name }}</td>
                    <td>{{ $customer->last_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>
                        <a href="tel:{{$customer->mobile}}">{{ $customer->mobile }}</a>
                    </td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ date('h:i:s a (d-M-y)', strtotime($customer->created_at)) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
