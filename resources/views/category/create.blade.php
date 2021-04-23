@extends('layouts.theme')
@section('page_name')
    Category list
@endsection
@section('title')
    Create Category
@endsection

@section('body')
   <div class="row m-0 p-0">
       <div class="col-md-6">
           <div class="border shadow p-5">
               <div class="fw-bold h4 bg-light px-1 py-3">Create Category</div>
               @if(Session::has('message'))
                   <p class="alert alert-success font-weight-bold">{{ Session::get('message') }}</p>
               @endif
               <form action="{{route('category.store')}}" method="POST">
                   @csrf
                   <label for="name">Enter Category Name</label>
                   <input type="text" id="name" class="form-control" name="category_name">
                   <br>
                   <button type="submit" class="btn btn-secondary">Create <i class="fa fa-save"></i></button>
               </form>
           </div>
       </div>
       <div class="col-md-6">
           <div class="h4">Category List</div>
           @if(count($categories) > 0)
               <table class="table table-bordered">
                   <thead  class="thead-light">
                   <tr>
                       <th>#</th>
                       <th>Name</th>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($categories as $item => $key)
                       <tr>
                           <td> {{ $key->id  }} </td>
                           <td> {{ $key->category_name  }} </td>
                       </tr>
                   @endforeach
                   </tbody>
               </table>
           @else
                <div> No Category Found </div>
           @endif

       </div>
   </div>
@endsection
