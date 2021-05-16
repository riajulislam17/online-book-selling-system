@extends('layouts.theme')

@section('body')
    <div class="">
        <div class="d-flex justify-content-center align-items-center" style="height: 85vh;">
            <div class="d-flex justify-content-center flex-column">
                <div class="h4 fw-bold text-center">{{ $tnx->server }}</div>
                <div class="h5 font-weight-bold py-3 text-center">{{ $tnx->database }}</div>
                <a href="{{ route('homePage') }}" class="btn btn-primary">Continue Shopping</a>
                <a href="{{ route('customer.profile') }}" class="btn btn-secondary my-3">Order List</a>
            </div>
        </div>
    </div>
@endsection
