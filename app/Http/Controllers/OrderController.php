<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }


    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Request
     */
    public function create(Product $product)
    {
        $currentUser = Auth::guard('customer')->user()->address;
        return view('order.create', ['product' => $product, 'address' => $currentUser]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'address' => 'required'
        ]);
        $total_price = (int)$product->price * (int)$request->input('product_count');
        $attributes = array(
            'seller_id' => $product->seller_id,
            'customer_id' => Auth::guard('customer')->id(),
            'product_id' => $product->id,
            'product_count' => (int)$request->input('product_count'),
            'product_price' => (int)$product->price,
            'total_price' => $total_price,
            'getaway' => $request->input('getaway'),
            'address' => $request->input('address'),
        );

        order::create($attributes);
        return redirect()->route('customer.profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
    }
}
