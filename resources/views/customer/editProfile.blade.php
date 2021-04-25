@extends('layouts.theme')

@section('body')
    <div class="row m-0 p-0">
        <div class="col-md-10 mx-auto">
            <div class="row m-0 p-0">
                <div class="col-md-2 bg-light border py-2">
                    <div class="d-flex flex-column">
                        <img src="{{ asset('siteImage/img.png') }}" alt="">
                        <p class="text-center my-3">Md Abdullah <i class="fa fa-check-circle text-success"></i> </p>
                        <div class="">
                            <p class="border border-info p-2"> <i class="fa fa-user"></i> Basic Information </p>
                            <p class="p-2"> <i class="fa fa-list"></i> Order List </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="d-flex flex-row">
                        <i class="fa fa-info-circle mr-3" style="font-size: 60px; color: #0ecd8b"></i>
                        <div class="w-100" >
                            <div class="h3 text-info text-uppercase">
                                personal information
                            </div>
                            <hr>
                            <table class="table table-borderless table-sm">
                                <tr>
                                    <td>Fast Name</td>
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
                                    <td>Member Science</td>
                                    <td>{{ date('d-M-Y', strtotime($profileInfo->created_at)) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
