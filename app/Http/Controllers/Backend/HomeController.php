<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controllers\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Products;
use App\Models\SaleOrderDetails;
use App\Models\User;
use App\Models\SaleOrder;

class HomeController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Products $Products, SaleOrderDetails $SaleOrderDetails, User $User, SaleOrder $SaleOrder)
    {
        $this->Products = $Products;
        $this->SaleOrderDetails = $SaleOrderDetails;
        $this->Users = $User;
        $this->SaleOrders = $SaleOrder;
        $this->middleware('auth');
    }

       /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

       public function loadpage()
    {
        //count products
        $ProductsCount = $this->Products->count();
        //count sales
        $SalesCount = $this->SaleOrderDetails->count();
        //count users
        $UsersCount = $this->Users->count();          
        //count orders
        $OrdersCount = $this->SaleOrders->count();
        return view('admin.dashboard', compact('ProductsCount','SalesCount','UsersCount','OrdersCount'));
    }
}
