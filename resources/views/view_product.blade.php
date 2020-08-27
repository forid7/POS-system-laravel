@extends('layouts.app')

@section('content')

<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
        <div class="row">

       <!-- Basic example -->

       <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">View Product</h3></div>
               


                <div class="panel-body">
                	<div class="form-group">
                	<div>
            
            	<img src="{{URL::to($prod->product_image)}}"style="height: 80px; width: 80px;">
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <p>{{$prod->product_name}}</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Product Code</label>
                    <p>{{$prod->product_code}}</p>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <p>{{$prod->cat_name}}</p>
                </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Supplier</label>
                     <p>{{$prod->name}}</p>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">WareHouse</label>
                    <p>{{$prod->product_garage}}</p>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Product Route</label>
                    <p>{{$prod->product_route}}</p>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Buying date </label>
                    <p>{{$prod->buy_date}}</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Expire Date</label>
                    <p>{{$prod->expire_date}}</p>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Buying Price</label>
                    <p>{{$prod->buying_price}}</p>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Selling Price</label>
                    <p>{{$prod->selling_price}}</p>
                </div>
               
                
                                                 
                
            
             </div>
            </div>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col-->

                    </div>
                    </div> <!-- container -->
                               
                </div> <!-- content -->
            </div>



@endsection