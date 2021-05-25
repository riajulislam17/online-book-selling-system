<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $currentDate = Carbon::now();
        $oneMonthAgo = Carbon::parse($currentDate)->subMonth();
         $lastMonthIncome = Invoice::all()->where('created_at', '>', $oneMonthAgo);

        return view('dashboard', [
            'seller' => Seller::all(),
            'products' => Product::all(),
            'customers' => Customer::all(),
            'sellers' => Seller::all(),
            'invoices' => Invoice::all()
        ]);
    }

    public function sellers()
    {
        return view('admin.sellers', ['sellers' => Seller::all()]);
    }


    public function customers()
    {
        return view('admin.customers', ['customers' => Customer::all()]);
    }

    public function orders()
    {
        return view('admin.orders', ['orders' => Invoice::all()]);
    }

    public function products()
    {
        return view('admin.products', ['products' => Product::all()]);
    }

    public function sellerDashboard()
    {
        return view('seller.dashboard', );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
