@extends('layouts.theme')
@section('body')
    <div class="row m-0 p-0">
        <div class="col-md-6 mx-auto">

            @if(Session::has('message'))
                <p class="alert alert-success font-weight-bold">{{ Session::get('message') }}</p>
            @endif
            <form action="{{ route('book.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="book_name">
                        Enter Book Name
                    </label>
                    <input type="text" class="form-control" name="book_name" id="book_name" value="{{$product->book_name}}">
                </div>

                <div class="mb-3">
                    <label for="publisher_name">
                        Enter publisher_name
                    </label>
                    <input type="text"  class="form-control" name="publisher_name" id="publisher_name" value="{{ $product->publisher_name }}">
                </div>


                <div class="mb-3">
                    <label for="writer_name">
                        Enter writer_name
                    </label>
                    <input type="text" class="form-control" name="writer_name" id="writer_name" value="{{ $product->writer_name }}">
                </div>

                <div class="mb-3">
                    <label for="stock">
                        Enter stock
                    </label>
                    <input type="number" class="form-control" name="stock" id="stock" value="{{ $product->stock }}">
                </div>

                <div class="mb-3">
                    <label for="price">
                        Enter price
                    </label>
                    <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}">
                </div>

                <div class="mb-3">
                    <label for="category_id">
                        Enter category_id
                    </label>

                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">select</option>
                        @foreach($category as $index => $key)
                            @if($key->id == $product->category_id)
                            <option value="{{$key->id}}" selected>{{$key->category_name}}</option>
                            @else
                                <option value="{{$key->id}}">{{$key->category_name}}</option>
                            @endif
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

                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $product->description }}</textarea>

                </div>
                <div class="d-flex justify-content-center p-2">
                    <button class="btn btn-secondary">Update <i class="fa fa-save"></i></button>
                </div>


            </form>
        </div>
    </div>
@endsection
