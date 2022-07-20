@extends('layouts.common')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <br>

    <ol class="breadcrumb">
      <li><a href="{{ URL('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li> <a href="{{ URL('products_prices') }}">Sale Orders
      </a></li>
      <li> <a href="#">Add Sale Order
      </a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <!-- /.box -->

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Sale Order Registration</h3>
            <div style="float: right;"><a class="btn bg-navy btn-flat margin" href="{{ URL('saleorder') }}">
             Sale Order List
           </a></div>

         </div>
         <!-- /.box-header -->         
         {!! Form::model($SaleOrders)!!}
         <div class="box-body">


          <div class="box box-default">

            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <center><p class="lead">Sale Order Information</p></center>
                <div class="col-md-4">
                  <div class="form-group">
                   <label>Customer Name</label>
                 
                   {!! Form::select('customer', ['' => 'Select']+$Customers->toArray(), null, array('class'=> 'form-control', 'width' => '100%'))!!}

                 </div>
                 @if ($errors->has('customer'))<em class="invalid-feedback">{!!$errors->first('customer')!!}</em>@endif
                 <!-- /.form-group -->              
              </div>
              <div class="col-md-4">
                <div class="form-group date">
                  <label>Order Date</label>                     
                  {!! Form::date('order_date', null, array('class'=> 'form-control pull-right', 'placeholder' => 'Enter ...'))!!}
                  @if ($errors->has('order_date'))<em class="invalid-feedback">{!!$errors->first('order_date')!!}</em>@endif
                  
                </div>
                <!-- /.form-group -->              
             </div>
             <!-- /.col -->
             <div class="col-md-4">
              <div class="form-group">
                <label>Status </label>
              {!! Form::select('status', ['1'=>'Active','0'=>'In-Active'],null, array('class'=> 'form-control','width'=>'100%'))!!}

              </div>
              <!-- /.form-group -->          
           </div>
           <!-- /.col -->
         </div>
         <div class="row">     

          <!-- /.col -->
          <br> <br> <br> <br>

          <a  href="{{ URL('saleorder/add') }}" class="btn bg-navy btn-flat margin" style="float: right;"><i class="ace-icon fa fa-undo bigger-110"></i> Cancel</a>
          {!! Form::submit('Save', array('class'=> 'btn bg-navy btn-flat margin', 'style' => 'float:right'))!!}

          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-body -->

    </div>
    <!-- /.box -->
  </div>
  <!-- /.box-body -->      
  {!! Form::close() !!}
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection