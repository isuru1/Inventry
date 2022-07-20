<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\SaleOrder;
use App\Models\Customers;

class SaleOrderController extends Controller
{
    public function __construct(SaleOrder $SaleOrder, Customers $Customers)
    {
        $this->SaleOrders = $SaleOrder;
        $this->Customers = $Customers;        
        $this->middleware('auth');
    }
    //load table
    public function SaleOrderList()
    {               
        $SaleOrderList = $this->SaleOrders->get();       
        return view('admin.viewSaleOrder', compact('SaleOrderList'));
    }
    //load form
    public function getSaleOrders()
    {
        $SaleOrders = $this->SaleOrders;
        $Customers = $this->Customers->pluck('customer_name','id');        
        return view('admin.addSaleOrder', compact('SaleOrders','Customers'));
    }
    //save
    public function postSaleOrders(Request $request)       
    {
        $this->validate($request,[
            'customer'   => 'required'
            
        ],
        [
            'customer.required'   => 'Customer Name field is required'
            
        ]);

        $SaleOrders = $this->SaleOrders;
        $SaleOrders->customer = $request->customer;
        $SaleOrders->order_date = $request->order_date;      
        $SaleOrders->status = $request->status;     
        $SaleOrders->save();

        return redirect('saleorder')->with('success','Successfully Saved');
    }
    //get details by id to edit
    public function getSaleOrdersById($id)
    {
        $SaleOrders = $this->SaleOrders->find($id);       
        $Customers = $this->Customers->pluck('customer_name','id');     
        return view('admin.addSaleOrder',compact('SaleOrders','Customers'));
    }
    //update
    public function postSaleOrdersById($id,Request $request)
    {       
        $SaleOrders = $this->SaleOrders->find($id);     
        $SaleOrders->customer = $request->customer;       
        $SaleOrders->order_date = $request->order_date;
        $SaleOrders->status = $request->status;
        $SaleOrders->save();
        return redirect('saleorder')->with('update','Successfully Updated');
    }
    //delete
    public function delete(Request $request)
    {
       // dd($request['delId']);
        $this->SaleOrders->find($request['delId'])->delete();
        return redirect('saleorder')->with('delete','Successfully Deleted');
    }
    //search
    public function search(Request $request)
    {
    $string = $request->input('query');
        //dd($string);
        $SaleOrderList = $this->SaleOrders
            ->Where('tblsaleorders.customer', 'LIKE', '%'.$string.'%')
            ->orWhere('tblsaleorders.order_date', 'LIKE', '%'.$string.'%')           
            ->orWhere('tblsaleorders.status', 'LIKE', '%'.$string.'%')          
            ->select('tblsaleorders.*')
            ->get();

    return view('admin.viewSaleOrder', compact('SaleOrderList','string'));    
    }
}
