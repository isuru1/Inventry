<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\SaleOrderDetails;
use App\Models\Customers;
use App\Models\Products;

class SaleOrderDetailsController extends Controller
{
    public function __construct(SaleOrderDetails $SaleOrderDetails, Customers $Customers, Products $Products)
    {
        $this->SaleOrderDetails = $SaleOrderDetails;        
        $this->Customers = $Customers;
        $this->Products = $Products;               
        $this->middleware('auth');
    }
    //load table
    public function SaleOrderDetailsList()
    {               
        $SaleOrderDetails = $this->SaleOrderDetails->get();       
        return view('admin.viewSaleOrderDetails', compact('SaleOrderDetails'));
    }
    //load form
    public function getSaleOrderDetails()
    {
        $SaleOrderDetails = $this->SaleOrderDetails;
        $Products = $this->Products->pluck('product_name','id');        
        $Customers = $this->Customers->pluck('customer_name','id');
               
        return view('admin.addSaleOrderDetails', compact('SaleOrderDetails','Customers','Products'));
    }
    //save
    public function postSaleOrderDetails(Request $request)       
    {
        $this->validate($request,[
            'order_id'   => 'required',
            'product'     => 'required',
            'qty'     => 'required',
            'price'     => 'required'
            
        ],
        [
            'order_id.required'   => 'Order field is required',
            'product.required'   => 'Product field is required',
            'qty.required'   => 'Qty field is required',
            'price.required'   => 'Price field is required'
            
        ]);

        $SaleOrderDetails = $this->SaleOrderDetails;
        $SaleOrderDetails->order_id = $request->order_id;        
        $SaleOrderDetails->product = $request->product;
        $SaleOrderDetails->qty = $request->qty;  
        $SaleOrderDetails->price = $request->price;        
        $SaleOrderDetails->status = $request->status;     
        $SaleOrderDetails->save();

        return redirect('saleorderdetails')->with('success','Successfully Saved');
    }
    //get details by id to edit
    public function getSaleOrderDetailsById($id)
    {
        $SaleOrderDetails = $this->SaleOrderDetails->find($id);
        $Products = $this->Products->pluck('product_name','id');
        $Customers = $this->Customers->pluck('customer_name','id');  
        return view('admin.addSaleOrderDetails',compact('SaleOrderDetails','Customers','Products'));
    }
    //update
    public function postSaleOrderDetailsById($id,Request $request)
    {       
        $SaleOrderDetails = $this->SaleOrderDetails->find($id);     
        $SaleOrderDetails->order_id = $request->order_id;
        $SaleOrderDetails->product = $request->product;
        $SaleOrderDetails->qty = $request->qty;  
        $SaleOrderDetails->price = $request->price;
        $SaleOrderDetails->status = $request->status;
        $SaleOrderDetails->save();
        return redirect('saleorderdetails')->with('update','Successfully Updated');
    }
    //delete
    public function delete(Request $request)
    {
       // dd($request['delId']);
        $this->SaleOrderDetails->find($request['delId'])->delete();
        return redirect('saleorderdetails')->with('delete','Successfully Deleted');
    }
    //search
    public function search(Request $request)
    {
    $string = $request->input('query');
        //dd($string);
        $SaleOrderDetails = $this->SaleOrderDetails
            ->Where('tblsaleorderdetails.order_id', 'LIKE', '%'.$string.'%')
            ->orWhere('tblsaleorderdetails.product', 'LIKE', '%'.$string.'%')
            ->orWhere('tblsaleorderdetails.qty', 'LIKE', '%'.$string.'%')
            ->orWhere('tblsaleorderdetails.price', 'LIKE', '%'.$string.'%')
            ->orWhere('tblsaleorderdetails.status', 'LIKE', '%'.$string.'%')          
            ->select('tblsaleorderdetails.*')
            ->get();

    return view('admin.viewSaleOrderDetails', compact('SaleOrderDetails','string'));    
    }
}
