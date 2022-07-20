@extends('layouts.common')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <br>

    <ol class="breadcrumb">
      <li><a href="{{ URL('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li> <a href="{{ URL('customers') }}">Customers
      </a></li>
      <li> <a href="#">Add Customers
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
            <h3 class="box-title">Customer Registration</h3>
            <div style="float: right;"><a class="btn bg-navy btn-flat margin" href="{{ URL('customers') }}">
             Customers List
           </a></div>

         </div>
         <!-- /.box-header -->
         {!! Form::model($Customers)!!}

         <div class="box-body">


          <div class="box box-default">

            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <center><p class="lead">Person Information</p></center>
                <div class="col-md-4">

                 <div class="form-group">

                  <label>Name</label>
                  {!! Form::text('customer_name', null, array('class'=> 'form-control', 'placeholder' => 'Enter ...'))!!}
                  @if ($errors->has('customer_name'))<em class="invalid-feedback">{!!$errors->first('customer_name')!!}</em>@endif
                  
                </div> 
                <!-- /.form-group -->              
              </div>
              <div class="col-md-4">
                 <div class="form-group">
                  <label>Email  </label>
                  {!! Form::text('email', null, array('class'=> 'form-control', 'placeholder' => 'Enter ...'))!!}
                  @if ($errors->has('email'))<em class="invalid-feedback">{!!$errors->first('email')!!}</em>@endif

                </div>
               
                <!-- /.form-group -->               
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <div class="form-group">
                  <label>Mobile</label>                     
                  {!! Form::text('mobile', null, array('class'=> 'form-control', 'placeholder' => 'Enter ...'))!!}
                  @if ($errors->has('mobile'))<em class="invalid-feedback">{!!$errors->first('mobile')!!}</em>@endif
                  
                </div>
                <!-- /.form-group -->                
              </div>
            </div>
           
            <!-- /.row -->
            <div class="row">
            
              <div class="col-md-4">
                <div class="form-group">
                  <label>Status </label>
                  {!! Form::select('status', ['1'=>'Active','0'=>'In-Active'],null, array('class'=> 'form-control','width'=>'100%'))!!}
                </div>
                <!-- /.form-group -->
              </div>             
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
          <div class="box-body">        
         <div class="row">
          <!-- /.col -->
          <br> <br> <br> <br>

          <a  href="{{ URL('customers/add') }}" class="btn bg-navy btn-flat margin" style="float: right;"><i class="ace-icon fa fa-undo bigger-110"></i> Cancel</a>
          {!! Form::submit('Save', array('class'=> 'btn bg-navy btn-flat margin', 'style' => 'float:right'))!!}
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
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