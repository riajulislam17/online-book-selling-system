<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:seller');
    }

    public function index()
    {
        return view('category.create', ['categories' => Category::all()]);
    }

    public function create()
    {
        return view('category.create', ['categories' => Category::all()]);
    }


    public function store(Request $request)
    {
        $attribute = $request->validate([
            'category_name' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:2048'
        ]);
        $attribute['user_id'] = Auth::guard('seller')->id();
        if ($request->hasFile('image'))
        {
            $imageName = 'category_' . time() .  "." . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $attribute['image'] = $imageName;
        }else{
            $attribute['image'] = '';
        }
        Category::create($attribute);

        return back()->with('message', 'Create Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category): RedirectResponse
    {
       $products = Product::all()->where('category_id', '=', $category->id);
       $images = array();
       $ids = array();
       foreach ($products as $product){
           array_push($images, public_path('images/'.$product->image));
           File::delete(public_path('images/'.$product->image));
           array_push($ids, $product->id);
       }
        Product::destroy($ids);
        File::delete(public_path('images/'.$category->image));
        $category->delete();
        return redirect()->route('category.create')->with('message', 'Delete Success');
    }
}
