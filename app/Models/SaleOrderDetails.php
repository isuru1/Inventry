<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOrderDetails extends Model
{
    use HasFactory;
    protected $table = 'tblsaleorderdetails';

    public function Customers(){
        return $this->belongsTo('App\Models\Customers','order_id');
    }

    public function OrderDate(){
        return $this->belongsTo('App\Models\SaleOrder','order_id','customer');
    }

    public function ProductName(){
        return $this->belongsTo('App\Models\Products','product');
    }
}