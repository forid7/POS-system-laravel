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
                <div class="panel-heading"><h3 class="panel-title">Update Company Information</h3></div>

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
            <form role="form" action="{{url('/update-website/'.$setting->id)}}" method="post" enctype="multipart/form-data">

            	@csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Company Name</label>
                    <input type="text" class="form-control" name="company_name" value="{{$setting->company_name}}"  required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">E-mail</label>
                    <input type="email" class="form-control" name="company_email" value="{{$setting->company_email}}" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Company Phone</label>
                    <input type="text" class="form-control" name="company_phone" value="{{$setting->company_phone}}" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Company Mobile</label>
                    <input type="text" class="form-control" name="company_mobile" value="{{$setting->company_mobile}}" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Company Address</label>
                    <input type="text" class="form-control" name="company_address" value="{{$setting->company_address}}" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <input type="text" class="form-control" name="company_city" value="{{$setting->company_city}}" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Country</label>
                    <input type="text" class="form-control" name="company_country" value="{{$setting->company_country}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Zip Code</label>
                    <input type="text" class="form-control" name="company_zipcode" value="{{$setting->company_zipcode}}" required>
                </div>
                

              

                <div class="form-group">
                	<img id="image" src="#" />
                    <label for="exampleInputPassword1">Photo</label>
                    <input type="file"  name="company_logo" accept="image/*" 
                    class="upload" required onchange="readURL(this);" >
                </div>
                
                 <div class="form-group">
               	  <img src="{{URL::to($setting->company_logo)}}" name="old_image" 
               	  style="height: 80px; width: 80px;">

               	  <input type="hidden" name="old_photo" value="{{$setting->company_logo}}">
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
			.width(80)
			.height(70);
		};
		reader.readAsDataURL(input.files[0]);
	}
}

</script>

@endsection