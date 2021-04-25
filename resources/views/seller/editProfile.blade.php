@extends('layouts.theme')
@section('title')
    {{ $profileInfo->proprietor_name }}
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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{route('seller.profile.update',$profileInfo->id)}}" method="post">
                                @csrf
                                @method('PATCH')

                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <td>Shop Name</td>
                                        <td>
                                            <input type="text" class="form-control" name="shop_name" aria-label="shop_name" value="{{$profileInfo->shop_name}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Proprietor Name</td>
                                        <td>
                                            <input type="text" value="{{$profileInfo->proprietor_name}}" name="proprietor_name" aria-label="proprietor_name">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>
                                            <input type="text" name="email" aria-label="email" value="{{$profileInfo->email}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td>
                                            <input type="text" name="mobile" aria-label="mobile" value="{{$profileInfo->mobile}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Member Science</td>
                                        <td>{{ date('d-M-Y', strtotime($profileInfo->created_at)) }}</td>
                                    </tr>
                                </table>
                                <div class="d-flex justify-content-center">
                                    <button type="submit">Update <i class="fa fa-save"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
