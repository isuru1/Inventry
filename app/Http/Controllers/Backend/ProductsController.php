<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
   public function __construct(Products $Products)
    {
        $this->Products = $Products;        
        $this->middleware('auth');
    }
    //load table
    public function ProductsList()
    {               
        $ProductsList = $this->Products->get();       
        return view('admin.viewProducts', compact('ProductsList'));
    }
    //load form
    public function getProducts()
    {
        $Products = $this->Products;
        return view('admin.addProducts', compact('Products'));
    }
    //save
    public function postProducts(Request $request)       
    {
        $this->validate($request,[
            'product_name'   => 'required|min:2|max:300'
            
        ],
        [
            'product_name.required'   => 'Category Name field is required'
            
        ]);

        $Products = $this->Products;
        $Products->product_name = $request->product_name;       
        $Products->status = $request->status;       
        $Products->save();

        return redirect('products')->with('success','Successfully Saved');
    }
    //get details by id to edit
    public function getProductsById($id)
    {
        $Products = $this->Products->find($id);     
        return view('admin.addProducts',compact('Products'));
    }
    //update
    public function postProductsById($id,Request $request)
    {       
        $Products = $this->Products->find($id);     
        $Products->product_name = $request->product_name;
        $Products->status = $request->status;
        $Products->save();
        return redirect('products')->with('update','Successfully Updated');
    }
    //delete
    public function delete(Request $request)
    {
       // dd($request['delId']);
        $this->Products->find($request['delId'])->delete();
        return redirect('products')->with('delete','Successfully Deleted');
    }
    //search
    public function search(Request $request)
    {
    $string = $request->input('query');
        //dd($string);
        $ProductsList = $this->Products
            ->Where('tblproduct.product_name', 'LIKE', '%'.$string.'%')
            ->orWhere('tblproduct.status', 'LIKE', '%'.$string.'%')          
            ->select('tblproduct.*')
            ->get();

    return view('admin.viewProducts', compact('ProductsList','string'));    
    }
}
