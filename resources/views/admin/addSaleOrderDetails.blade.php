@extends('layouts.common')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <br>

    <ol class="breadcrumb">
      <li><a href="{{ URL('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li> <a href="{{ URL('saleorderdetails') }}">Sale Order Details
      </a></li>
      <li> <a href="#">Add Sale Order Detail
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
            <h3 class="box-title">Sale Order Details Registration</h3>
            <div style="float: right;"><a class="btn bg-navy btn-flat margin" href="{{ URL('saleorderdetails') }}">
             Sale Order Details
           </a></div>

         </div>
         <!-- /.box-header -->
         {!! Form::model($SaleOrderDetails)!!}

         <div class="box-body">


          <div class="box box-default">

            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <center><p class="lead">Sale Order Detail Information</p></center>
                <div class="col-md-4">

                 <div class="form-group">

                  <label>Order By</label>
                   {!! Form::select('order_id', ['' => 'Select']+$Customers->toArray(), null, array('class'=> 'form-control', 'width' => '100%'))!!}
                  @if ($errors->has('order_id'))<em class="invalid-feedback">{!!$errors->first('order_id')!!}</em>@endif
                  
                </div> 
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Price </label>
                  {!! Form::number('price', null, array('class'=> 'form-control', 'placeholder' => 'Enter ...'))!!}          
                 @if ($errors->has('price'))<em class="invalid-feedback">{!!$errors->first('price')!!}</em>@endif
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>ProductName</label>                     
                {!! Form::select('product', ['' => 'Select']+$Products->toArray(), null, array('class'=> 'form-control', 'width' => '100%'))!!}
                  @if ($errors->has('product'))<em class="invalid-feedback">{!!$errors->first('product')!!}</em>@endif
                  
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                 <label>Status </label>
                 {!! Form::select('status', ['1'=>'Active','0'=>'In-Active'],null, array('class'=> 'form-control','width'=>'100%'))!!}
               </div>
               <!-- /.form-group -->
             </div>
             <!-- /.col -->
             <div class="col-md-4">
              <div class="form-group">
                <label>Qty  </label>
                {!! Form::number('qty', null, array('class'=> 'form-control', 'placeholder' => 'Enter ...'))!!}
                @if ($errors->has('qty'))<em class="invalid-feedback">{!!$errors->first('qty')!!}</em>@endif

              </div>
              <!-- /.form-group -->
             

           
           </div>
         
          
          <!-- /.col -->
        </div>
        <div class="row">
       
       
        <br> <br> <br> <br>

        <a  href="{{ URL('saleorderdetails/add') }}" class="btn bg-navy btn-flat margin" style="float: right;"><i class="ace-icon fa fa-undo bigger-110"></i> Cancel</a>
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