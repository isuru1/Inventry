<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CustomersController extends Controller
{
   public function __construct(Customers $Customers)
    {
        $this->Customers = $Customers;
        $this->middleware('auth');
    }
    //load table
    public function CustomersList()
    {
        $CustomersList = $this->Customers->get();       
        return view('admin.viewCustomers', compact('CustomersList'));
    }
    //load form
    public function getCustomers()
    {

        $Customers = $this->Customers;       
        return view('admin.addCustomers', compact('Customers'));
    }
    //save
    public function postCustomers(Request $request)       
    {
        $this->validate($request,[
            'customer_name'   => 'required',
            'mobile'   => 'required|min:10|max:10'
        ],
        [
            'customer_name.required'   => 'Customer Name field is required',
            'mobile.required'   => 'Mobile field is required'
        ]);

        $Customers = $this->Customers;        
        $Customers->customer_name = $request->customer_name;
        $Customers->email = $request->email;
        $Customers->mobile = $request->mobile;      
        $Customers->status = $request->status;
        $Customers->save();

        return redirect('customers')->with('success','Successfully Saved');
    }
    //get details by id to edit
    public function getCustomersById($id)
    {
        $Customers = $this->Customers->find($id);
        return view('admin.addCustomers',compact('Customers'));
    }
    //update
    public function postCustomersById($id,Request $request)
    {
        $Customers = $this->Customers->find($id);
        $Customers->customer_name = $request->customer_name;
        $Customers->email = $request->email;
        $Customers->mobile = $request->mobile;    
        $Customers->status = $request->status;
        $Customers->save();
        return redirect('customers')->with('update','Successfully Updated');
    }
    //delete
    public function delete(Request $request)
    {
       // dd($request['delId']);
        $this->Customers->find($request['delId'])->delete();
        return redirect('customers')->with('delete','Successfully Deleted');
    }
    //search
    public function search(Request $request)
    {
    $string = $request->input('query');
        //dd($string);
        $CustomersList = $this->Customers
            ->Where('tblcustomer.customer_name', 'LIKE', '%'.$string.'%')
            ->orWhere('tblcustomer.email', 'LIKE', '%'.$string.'%')
            ->orWhere('tblcustomer.mobile', 'LIKE', '%'.$string.'%')
            ->orWhere('tblcustomer.status', 'LIKE', '%'.$string.'%')                     
            ->select('tblcustomer.*')
            ->get();

    return view('admin.viewCustomers', compact('CustomersList','string'));    
    }
}
