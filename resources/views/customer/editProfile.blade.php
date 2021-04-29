@extends('layouts.theme')
@section('title')
    Edit Profile
@endsection
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
                            <form action="{{ route('customer.profile.update', $profileInfo->id) }}" method="POST">
                                @csrf
                                @method('patch')
                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <td>Fast Name</td>
                                        <td>
                                            <input type="text" class="form-control" name="first_name" id="first_name" aria-label="first_name" value="{{$profileInfo->first_name}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Last Name</td>
                                        <td>
                                            <input type="text"  class="form-control" name="last_name" id="last_name" aria-label="last_name" value="{{$profileInfo->last_name}}">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <input type="text"  class="form-control" name="email" aria-label="email" id="email" value="{{$profileInfo->email}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td>
                                            <input type="text" class="form-control" name="mobile" id="mobile" value="{{$profileInfo->mobile}}" aria-label="mobile">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>
                                            <input type="text" class="form-control" name="address" id="address" aria-label="address" value=" {{ $profileInfo->address }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Member Science</td>
                                        <td>{{ date('d-M-Y', strtotime($profileInfo->created_at)) }}</td>
                                    </tr>
                                </table>
                                <div class="d-flex justify-content-center py-3">
                                    <a href="{{ route('customer.profile') }}" class="btn btn-danger mx-3">Close <i class="fa fa-times"></i></a>
                                    <button type="submit" class="btn btn-secondary">Update <i class="fa fa-save"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
