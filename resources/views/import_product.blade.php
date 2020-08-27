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
            <div class="panel panel-info">
            <div class="panel-heading"><h3 class="panel-title text-white">Products Import 
            <a href="{{route('export')}}" class="pull-right btn btn-danger btn-sm">Download xlsx</a></h3></div>
                 
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
            <form role="form" action="{{route('import')}}" method="post" enctype="multipart/form-data" >

            	@csrf
               
                 
                 <div class="form-group">
                    <label for="exampleInputPassword1">Xlsx File Import</label>
                    <input type="file" name="import_file" required>
                </div>
           
                       
                
              <button type="submit" class="btn btn-success waves-effect waves-light">Upload</button>
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


@endsection