<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSaleOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TblSaleOrders', function (Blueprint $table) {
            $table->id();
            $table->string('customer');
            $table->timestamp('order_date');
            $table->timestamps();
            $table->boolean('status');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TblSaleOrders');
    }
}
