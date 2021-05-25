<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function profile()
    {
        $customerId = Auth::guard('customer')->id();
        $customerInfo = Customer::findOrFail($customerId);
        $orders = Invoice::all()->where('customer_id', '=', $customerId);
        return view('customer.profile', ['profileInfo' => $customerInfo, 'orders' => $orders]);
    }

    public function showProfileEdit()
    {
        return view('customer.editProfile', ['profileInfo' => Customer::findOrFail(Auth::guard('customer')->id())]);
    }
    public function addToCart(Product $product): RedirectResponse
    {
        $userId = Auth::guard('customer')->id();
        Cart::session($userId)->add(array(
            'id' => $product->id, // unique row ID
            'name' => $product->book_name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));
        return redirect()->route('homePage')->with('message', 'Add to Cart success');
    }
    public function viewCart()
    {
        $userId = Auth::guard('customer')->id();
        $cartCollection = Cart::session($userId)->getContent();
        return view('invoices.cart_view', ['carts' => $cartCollection]);
    }

    public function removeCart($id): RedirectResponse
    {
        $userId = Auth::guard('customer')->id();
        Cart::session($userId)->remove($id);
        return back();
    }

    public function profileUpdate(Request $request, Customer $customer): RedirectResponse
    {
        $attributes = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required|max:11|min:11',
            'address' => 'required'
        ]);
        $customer->update($attributes);
        $request->session()->flash('message', 'Profile Update Success');
        return redirect()->route('customer.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @return Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @return Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Customer $customer
     * @return Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @return Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
