@extends('layouts.theme')
@section('title')
    Create Post
@endsection
@section('page_name')
    Create Post
@endsection

@section('body')
    <div class="w-50 border shadow p-5">
        <h3> Post a Book for sell <a href="{{route('book.index')}}" class="float-end">book list</a></h3>
        <hr>
        @if(session('message'))
            {{session('message')}}
            @endif

        <form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="book_name">
                    Enter Book Name
                </label>
                <input type="text" class="form-control" name="book_name" id="book_name">
            </div>

            <div class="mb-3">
                <label for="publisher_name">
                    Enter publisher_name
                </label>
                <input type="text"  class="form-control" name="publisher_name" id="publisher_name">
            </div>


            <div class="mb-3">
                <label for="writer_name">
                    Enter writer_name
                </label>
                <input type="text" class="form-control" name="writer_name" id="writer_name">
            </div>

            <div class="mb-3">
                <label for="stock">
                    Enter stock
                </label>
                <input type="number" class="form-control" name="stock" id="stock">
            </div>

            <div class="mb-3">
                <label for="price">
                    Enter price
                </label>
                <input type="number" class="form-control" name="price" id="price">
            </div>

            <div class="mb-3">
                <label for="category_id">
                    Enter category_id
                </label>

                <select name="category_id" id="category_id" class="form-control">
                    <option value="">select</option>
                    @foreach($category as $index => $key)
                        <option value="{{$key->id}}">{{$key->category_name}}</option>

                    @endforeach

                </select>

            </div>


            <div class="mb-3">
                <label for="category_id">
                    Enter image
                </label>

                <input type="file" id="image" name="image" class="form-control">

            </div>


            <div class="mb-3">
                <label for="description">
                    Enter description
                </label>

                <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>

            </div>
            <div class="d-flex justify-content-center p-2">
                <input type="submit" class="btn btn-success" value="post" name="submit">
            </div>



        </form>
    </div>
    @endsection
