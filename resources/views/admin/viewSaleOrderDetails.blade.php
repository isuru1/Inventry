@extends('layouts.common')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <br>

    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">
      Sale Order Details </a></li>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <!-- /.box -->
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Alert!</h4>
          {{ session()->get('success') }}
        </div>

        @endif
        @if(session()->has('update'))
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-warning"></i> Alert!</h4>
          {{ session()->get('update') }}
        </div>

        @endif
        @if(session()->has('delete'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Alert!</h4>
          {{ session()->get('delete') }}
        </div>

        @endif
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Sale Order Details</h3>
            <a href="{{ URL('saleorderdetails/add') }}" class="btn bg-navy btn-flat margin" style="float:right">Add Sale Order Detail</a>            
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            {!! Form::open(array('url' => 'saleorderdetails/search', 'method'=>'get', 'class'=> 'form-inline','files'=>'true','id'=>'search-form'))!!}
            {!! Form::text('query',$string ?? '', array('class'=> 'form-control w-100','placeholder' => 'Search Here...'))!!}
           
            {!! Form::close() !!}
            <br>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>Order Date</th>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Price (Rs.)</th>
                  <th>Created On</th>
                  <th>Updated On</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <script>
                                            //delete function
                                            function delete_orderdetail(){

                                              var id =$("#DelID").val();
                                              $.post( "saleorderdetails/delete", { delId: id , "_token": "{{ csrf_token() }}"})
                                              .done(function( data ) {
                                                alert( "Data deleted" + data);
                                              });
                                            }
                                            function set_del(delid){
                                              $("#DelID").val(delid);
                                            }
                                          </script>
                                          <div class="modal modal-danger" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                  <h4 class="modal-title">Warning !</h4>
                                                </div>
                                                <div class="modal-body">
                                                  <p>Are you sure you want to delete this Sale Order Detail ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                  <input type="hidden" id="DelID" value="{{request()->route('id')}}" />
                                                  <a href="" class="btn btn-outline" onclick="delete_orderdetail()"><i></i>Delete</a> </div>
                                                </div>
                                                <!-- /.modal-content -->
                                              </div>
                                              <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                            <tbody>
                                             @foreach ($SaleOrderDetails as $OrderDetail)
                                             <tr>
                                               <td>{{ $OrderDetail->Customers->customer_name }}</td>
                                               <td>{{ !empty($OrderDetail->OrderDate->order_date) ? $OrderDetail->OrderDate->order_date:'' }}</td>
                                               <td>{{ $OrderDetail->ProductName->product_name }}</td>
                                               <td>{{ $OrderDetail->qty }}</td>                 
                                               <td>{{ $OrderDetail->price }}</td>
                                               <td>{{ $OrderDetail->created_at }}</td>
                                               <td>{{ $OrderDetail->updated_at }}</td>
                                               <td>
                                                @if($OrderDetail->status == 1)
                                                <span class="label label-success">Active</span>
                                                @else
                                                <span class="label label-warning">In-Active</span>
                                                @endif

                                              </td>

                                              <td>
                                                <div class="btn-xs btn-group">
                                                  <button type="button" class="btn btn-xs btn-info">Select</button>
                                                  <button type="button" class="btn btn-xs btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                  </button>
                                                  <ul class="dropdown-menu" role="menu">
                                                    <li><a href="{{ URL('saleorderdetails/'.$OrderDetail->id.'/edit')}}">Edit</a></li>
                                                    <li><a href="#" onclick="set_del({{ $OrderDetail->id }})" data-toggle="modal" data-target="#myModal">Delete</a></li>                    
                                                   
                                                  </ul>
                                                </div>
                                              </td>
                                            </tr>
                                            @endforeach

                                          </tbody>

                                        </table>
                                      </div>
                                      <!-- /.box-body -->
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