@extends('layouts.common')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$ProductsCount ?? ''}}</h3>

              <p>New Products</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ URL('products') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$SalesCount ?? ''}}</h3>

              <p>Sales</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ URL('saleorderdetails') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$UsersCount ?? ''}}</h3>

              <p>New Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$OrdersCount ?? ''}}</h3>

              <p>Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ URL('saleorder') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->


      <div class="row">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!-- Left col -->
           @if(Auth::user()->user_type == 2) 
           @php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  // collect value of input field
   $startDate = isset($_POST["startDate"]);
      $endDate = isset($_POST["endDate"]);
 $currentDate = date('m-d-Y');    
   
$currentDate = date('m-d-Y', strtotime($currentDate)); 
$startDate = date('m-d-Y', strtotime($startDate));
$endDate = date('m-d-Y', strtotime($endDate));   
if (($currentDate >= $startDate) && ($currentDate <= $endDate)){   
  echo "Current date is between two dates";
}else{    
  echo "Current date is not between two dates";  
}
}

      
@endphp<br>    
            <div class="col-md-4">
              <form action="{{ URL('dashboard') }}" method="GET">
                <div class="form-group date">
                  <label>Start Date</label>                     
                  {!! Form::date('startDate', null, array('class'=> 'form-control pull-right', 'placeholder' => 'Enter ...'))!!}
                  @if ($errors->has('startDate'))<em class="invalid-feedback">{!!$errors->first('startDate')!!}</em>@endif
                  
                </div>
                <!-- /.form-group -->              
             </div>
              <div class="col-md-4">
                <div class="form-group date">
                  <label>End Date</label>                     
                  {!! Form::date('endDate', null, array('class'=> 'form-control pull-right', 'placeholder' => 'Enter ...'))!!}
                  @if ($errors->has('endDate'))<em class="invalid-feedback">{!!$errors->first('endDate')!!}</em>@endif
                  
                </div>
                <!-- /.form-group -->              
             </div> <br>
             <div class="col-md-4">
               <div class="form-group date">
             <input class="btn bg-navy btn-flat margin" type="submit" value="Submit" style="margin-top: 5px;" />
               </div>

                </div>
           </form>
             <br>     <br>       <br>       <br>      
       <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
             
              <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

          
        </section>      
       @else
          
       @endif
       
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
       
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  @endsection