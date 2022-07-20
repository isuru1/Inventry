<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleOrder extends Model
{
    use HasFactory;
    protected $table = 'tblsaleorders';

    public function Customers(){
        return $this->belongsTo('App\Models\Customers','customer');
    }
}