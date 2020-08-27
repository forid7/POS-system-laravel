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
            <div class="panel-heading"><h3 class="panel-title">Add Expense
            <a href="{{route('today.expense')}}" class="btn btn-sm btn-danger pull-right">Today Expense</a>
            <a href="{{route('monthly.expense')}}" class="btn btn-sm btn-info pull-right">This Month Expense</a>
            </h3>
                
            </div>

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
           <form role="form" action="{{url('/insert-expense')}}" method="post" >

                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Expense Details</label>
                    <textarea class="form-control" rows="4" name="details"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Amount</label>
                    <input type="text" class="form-control" name="amount" placeholder="Amount" required>
                </div>
                 <div class="form-group">
                   
                    <input type="hidden" class="form-control" name="date" value="{{date("d/m/y")}}">
                </div>
                <div class="form-group">
                   
                    <input type="hidden" class="form-control" name="month" value="{{date("F")}}">
                </div>
                <div class="form-group">
                   
                    <input type="hidden" class="form-control" name="year" value="{{date("Y")}}">
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



@endsection