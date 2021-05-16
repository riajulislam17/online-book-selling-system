@extends('layouts.theme')

@section('title')
    Shopping Cart
@endsection
@section('body')
    <div class="h3 bg-light py-2">Shopping Cart</div>
   <div class="row m-0 p-0">
       <div class="col-md-6">
           @if($carts->count() > 0)
               <table class="table table-sm table-borderless">
                   <thead>
                   <tr>
                       <th>#</th>
                       <th>Name</th>
                       <th>Shop</th>
                       <th>Quantity</th>
                       <th>Price</th>
                       <th>Total</th>
                       <th>Action</th>
                   </tr>
                   </thead>
                   <tbody>
                   @php
                   $totalPrice = 0;
                   @endphp
                   @foreach($carts as $key => $cat)
                       @php
                            $totalPrice += $cat->quantity * $cat->associatedModel->price;
                       @endphp
                       <tr>
                           <td>
                               {{$key}}
                           </td>
                           <td>
                               {{$cat->associatedModel->book_name}}
                           </td>
                           <td>
                               {{$cat->associatedModel->seller->shop_name}}
                           </td>
                           <td>
                               {{$cat->quantity}}
                           </td>
                           <td>
                               {{$cat->associatedModel->price}} Tk
                           </td> <td>
                               {{$cat->associatedModel->price * $cat->quantity}} Tk
                           </td>

                           <td>
                               <a href="{{ route('cart.remove', $key) }}" class="">Remove</a>
                           </td>
                       </tr>
                   @endforeach
                   <tr>
                       <td colspan="5">

                       </td>
                       <td colspan="1">
                           {{ $totalPrice }} Tk
                       </td>
                   </tr>
                   </tbody>
               </table>

           @else
               <div class="h5 text-center">
                   Cart is Empty
               </div>
           @endif
           <div class="d-flex justify-content-between">
               <a href="{{ route('homePage') }}" class="btn btn-primary">Continue Shopping</a>
               <a href="{{ route('payment') }}" class="btn btn-primary">Process to Payment</a>
           </div>
       </div>
       <div class="col-md-6"></div>
   </div>
@endsection
