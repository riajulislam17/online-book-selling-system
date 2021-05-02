<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function dashboard()
    {
        return view('seller.dashboard', ['books' => Product::all()->where('seller_id', '=', Auth::guard('seller')->id())]);
    }


    public function profile()
    {
        return view('seller.profile', ['profileInfo' => Seller::findOrFail(Auth::guard('seller')->id())]);
    }


    public function showProfileEdit()
    {
        return view('seller.editProfile', ['profileInfo' => Seller::findOrFail(Auth::guard('seller')->id())]);
    }

    public function categoryIndex()
    {
        $categories = Category::all()->where('user_id', '=', Auth::guard('seller')->id());
        return view('category.create', compact('categories'));
    }


    public function productIndex()
    {
        $categories = Category::all()->where('user_id', '=', Auth::guard('seller')->id());
        $products = Product::all()->where('user_id', '=', Auth::guard('seller')->id());
        return view('product.index', ['products' => $products, 'categories' => $categories]);
    }


    public function profileUpdate(Request $request, Seller $seller): RedirectResponse
    {
        $attributes = $request->validate([
           'shop_name' => 'required',
           'proprietor_name' => 'required',
           'email' => 'required',
           'mobile' => 'required'
        ]);
        $seller->update($attributes);
        return redirect()->route('seller.profile')->with('message', 'Profile Update Success');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
