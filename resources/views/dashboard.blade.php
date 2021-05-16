@extends('layouts.theme')
@section('title')
   Dashboard
@endsection

@section('body')
    <div class="">
        <table class="table table-sm table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Shop</th>
                <th>Total Sale</th>
                <th>Joined Date</th>
            </tr>
            </thead>
            @foreach($seller as $item)
                   <tr>
                       <td>{{ $item->id }}</td>
                       <td>{{ $item->shop_name }} </td>
                       <td>{{ $item->lastMonthOrder->sum('total_price') }}</td>
                       <td>{{ date('d-M-y', strtotime($item->created_at)) }} </td>
                   </tr>
            @endforeach
        </table>
    </div>
@endsection
