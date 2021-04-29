<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function profile()
    {
        $customerId = Auth::guard('customer')->id();
        $customerInfo = Customer::findOrFail($customerId);
        $orders = order::all()->where('customer_id', '=', $customerId);
        return view('customer.profile', ['profileInfo' => $customerInfo, 'orders' => $orders]);
    }

    public function showProfileEdit()
    {
        return view('customer.editProfile', ['profileInfo' => Customer::findOrFail(Auth::guard('customer')->id())]);
    }

    public function profileUpdate(Request $request, Customer $customer): \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
