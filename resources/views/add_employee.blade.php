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
                <div class="panel-heading"><h3 class="panel-title">Add Employee</h3></div>

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
            <form role="form" action="{{url('/insert-employee')}}" method="post" enctype="multipart/form-data">

            	@csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="phone" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="address" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Experience</label>
                    <input type="text" class="form-control" name="experience" placeholder="experience" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">NID NO.</label>
                    <input type="text" class="form-control" name="nid_no" placeholder="NID NO" required>
                </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Salary</label>
                    <input type="text" class="form-control" name="salary" placeholder="salary" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Vacation</label>
                    <input type="text" class="form-control" name="vacation" placeholder="vacation" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">City</label>
                    <input type="text" class="form-control" name="city" placeholder="city" required>
                </div>
                <div class="form-group">
                	<img id="image" src="#" />
                    <label for="exampleInputPassword1">Photo</label>
                    <input type="file"  name="image" accept="image/*" 
                    class="upload" required onchange="readURL(this);" >
                </div>
                
                   
               
                
                <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
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