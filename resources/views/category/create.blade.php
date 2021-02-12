@extends('layout.login')

@section('title')
    Create Category
@endsection

@section('body')
   <div class="w-50 border shadow p-5">
       @if(Session::has('message'))
           <p class="alert">{{ Session::get('message') }}</p>
       @endif
           <a href="{{route('category.index')}}"> Category List </a>
       <form action="{{route('category.store')}}" method="POST">
           @csrf
           <label for="name">Enter Category Name</label>
           <input type="text" id="name" class="form-control" name="category_name">
           <br>
           <input type="submit" class="btn btn-success" value="Create">


       </form>
   </div>
@endsection
