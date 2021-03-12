@extends('layouts.theme')
@section('page_name')
    Category list
@endsection
@section('body')

    <div class="">
        <a href="{{route('category.create')}}"> Create Category </a>
        <table class="table table-bordered">
            <thead  class="thead-light">
            <tr>
                <td>#id</td>
                <td>name</td>
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item => $key)
                <tr>
                    <td> {{ $key->id  }} </td>
                    <td> {{ $key->category_name  }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
