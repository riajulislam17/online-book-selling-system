<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        //
        $books = Product::all();

        return view('product.index', ['books' => $books]);
    }


    public function create()
    {
        //
        $categoryList = Category::all();
        return view('product.create', ['category' => $categoryList]);
    }


    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        //

        $this->validate($request, ['image' => 'required|image|mimes:jpeg,png,jpg|max:1080']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

        }

        $product = new Product;
        $product->book_name =  $request->book_name;
        $product->publisher_name =  $request->publisher_name;
        $product->writer_name =  $request->writer_name;
        $product->stock =  $request->stock;
        $product->price =  $request->price;
        $product->category_id =  $request->category_id;
        $product->image =  $name;
        $product->description =  $request->description;
        $product->save();

        return redirect()->route('book.create')->with('message', 'Post Create Success');


    }

    public function show($id)
    {
        return view('product.show', ['data' => Product::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
