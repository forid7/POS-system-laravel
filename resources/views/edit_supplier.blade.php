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
                <div class="panel-heading"><h3 class="panel-title">Update Supplier</h3></div>

                @if ($errors->any())
             <div class="alert alert-danger">
               <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
              </ul>
              </div>
                @endif

                <div class="panel-body">
                	<div class="form-group">
                	<div>
            <form role="form" action="{{url('/update-supplier/'.$sup->id)}}" method="post" enctype="multipart/form-data">

            	@csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Supplier Name</label>
                    <input type="text" class="form-control" name="name" value="{{$sup->name}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">E-mail</label>
                    <input type="email" class="form-control" name="email" value="{{$sup->email}}" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{$sup->phone}}" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" name="address" 
                    value="{{$sup->address}}" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Shop Name</label>
                    <input type="text" class="form-control" name="shop" 
                    value="{{$sup->shop}}" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Account Holder</label>
                    <input type="text" class="form-control" name="accountholder" value="{{$sup->accountholder}}" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Account Number </label>
                    <input type="text" class="form-control" name="accountnumber" value="{{$sup->accountnumber}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Bank Name</label>
                    <input type="text" class="form-control" name="bankname" value="{{$sup->bankname}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Branch Name</label>
                    <input type="text" class="form-control" name="branchname" value="{{$sup->branchname}}" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <input type="text" class="form-control" name="city" value="{{$sup->city}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Supplier Type</label>
                    <select name="type" class="form-control">
                    	{{-- <option disabled="" selected=""></option>
                    	<option value="Distributor">Distributor</option>
                    	<option value="Whole Seller">Whole Seller</option>
                    	<option value="transporter">transporter</option> --}}
                    	<option value="{{$sup->type}}">{{$sup->type}}</option>
                    </select>
                </div>
                <div class="form-group">
                	<img id="image" src="#" />
                    <label for="exampleInputPassword1">Photo</label>
                    <input type="file"  name="image" accept="image/*" 
                    class="upload"  onchange="readURL(this);" >
                </div>

                <div class="form-group">
                	<img  src="{{URL::to($sup->image)}}" style="height: 90px;width: 90px;" />
                	<input type="hidden" name="old_photo" value="{{$sup->image}}">
                    
                </div>
                
                   
               
                
                <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
            </form>
             </div>
            </div>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col-->

                    </div>
                    </div> <!-- container -->
                               
                </div> <!-- content -->
            </div>

<script type="text/javascript">
	
function readURL(input) {
	if (input.files&&input.files[0]) {
		var reader = new FileReader();
		reader.onload=function(e)
		{
			$('#image')
			.attr('src', e.target.result)
			.width(70)
			.height(60);
		};
		reader.readAsDataURL(input.files[0]);
	}
}

</script>

@endsection