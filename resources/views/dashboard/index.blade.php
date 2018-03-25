@extends('layout.main')
@section('content')
	<section class="content-header">
		<h1 class="page-title">
			Dashboard
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		</ol>
	</section>
	<section class="content body">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3>{{$nationalusers}}</h3>
						<p>National Users</p>
					</div>
					<div class="icon">
						<i class="fa fa-user"></i>
					</div>
					<a href="{{url('/nationaluser')}}" class="small-box-footer">Go to <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>{{$nationalusers}}</h3>
						<p>Treasury Users</p>
					</div>
					<div class="icon">
						<i class="fa fa-user"></i>
					</div>
					<a href="{{url('/nationaluser')}}" class="small-box-footer">Go to <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<div class="small-box bg-green">
					<div class="inner">
						<h3>{{$nationalusers}}</h3>
						<p>Line Ministry Users</p>
					</div>
					<div class="icon">
						<i class="fa fa-user"></i>
					</div>
					<a href="{{url('/nationaluser')}}" class="small-box-footer">Go to <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</section>
@endsection
@section('internal_js')
	<script>
        $('.table').DataTable({
            "responsive": true
        })
	</script>
@endsection

