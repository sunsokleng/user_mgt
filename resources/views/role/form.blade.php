@extends('layout.main')
@section('content')
	<section class="content-header">
		<h1>
			Role
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Role</a></li>
			<li class="active">Form</li>
		</ol>
	</section>
	
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12 col-lg-offset-3">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Role Form</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" method="post" action="{{url('/role/save')}}">
						
						{{csrf_field()}}
						@if(isset($model))
							<input type="hidden" name="id" value="{{$model->id}}">
						@endif
						<div class="box-body">
							<div class="form-group">
								<label for="">Name</label>
								<input
										type="text"
										name="input[name]"
										class="form-control"
										value="{{isset($model)?$model->name:''}}" >
							</div>
							<div class="form-group">
								<label for="">Description</label>
								<input
										type="text"
										name="input[description]"
										value="{{isset($model)?$model->description:''}}"
										class="form-control">
							</div>
						</div>
						<!-- /.box-body -->
						
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /.row -->
	
	</section>
@endsection

