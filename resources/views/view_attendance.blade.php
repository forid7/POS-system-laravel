
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


				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">View Attendance  <a href="{{route('all.attendance')}}" class="btn btn-sm btn-info pull-right">All Attendance</a></h3>
						</div>
						<h3 class="text-success" align="center">View Attendance {{$date->att_date}}</h3>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<table {{-- id="datatable" --}} class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Name</th>
												<th>Photo</th>
												<th>Attendance</th>

											</tr>
										</thead>


										<tbody>
											
											@foreach($data as $row)
											<tr>
												<td>{{$row->name}}</td>

												<td><img src="{{URL::to($row->image)}}" style="height: 60px; width: 60px;"></td>

												<input type="hidden" name="id[]" value="{{$row->id}}">

												<td>
													<input type="radio" name="attendance[{{$row->id}}]" value="Present" disabled=""<?php
													if ($row->attendance=='Present') {
														echo "checked";
													}
													?>>Present
													<input type="radio" name="attendance[{{$row->id}}]" value="Absence" disabled="" <?php
													if ($row->attendance=='Absence') {
														echo "checked";
													}
													?>>Absence
												</td>
												<input type="hidden" name="att_date" value="{{date("d/m/y")}}">
												<input type="hidden" name="att_year" value="{{date("Y")}}">
												<input type="hidden" name="month" value="{{date("F")}}">

											</tr>
											@endforeach


										</tbody>

									</table>

								</form>

							</div>
						</div>
					</div>
				</div>
			</div>



		</div>
	</div> <!-- container -->

</div> <!-- content -->
</div>



@endsection