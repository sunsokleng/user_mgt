@extends('layout.main')
@section('content')
	<section class="content-header">
		<h1>
			Employee
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Employee Info</a></li>
			<li class="active">Form</li>
		</ol>
	</section>
	
	<section class="content">
		<div class="box-body">
		<!-- Small boxes (Stat box) -->
		<div class="row" style="background:#fff;">

				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title"></h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<form role="form" method="post" action="{{url('/employee/save')}}" enctype="multipart/form-data">
						
						{{csrf_field()}}
						@if(isset($model))
							<input type="hidden" name="id" value="{{$model->id}}">
						@endif
						<div style="clear:both;">
						<div class="col-md-6" style="background:#fff;">
							<div class="form-group">
								<label for="">ឈ្មោះមន្រ្តី</label>
								<input
										type="text"
										name="input[name]"
										class="form-control"
										value="{{isset($model)?$model->name:''}}" >
							</div>
							<div class="form-group">
								<label for="">ភេទ</label>
								<select
										name="input[sex]"
										required
										class="form-control select2">
									<option
											value="ប្រុស"
											{{isset($model)&&$model->sex=='M'?'selected':''}}>
										Male
									</option>
									<option
											value="ស្រី"
											{{isset($model)&&$model->sex=='F'?'selected':''}}>
										Female
									</option>
								</select>
							</div>
							<div class="form-group">
								<label for="">មុខតំណែង</label>
								<select
										name="input[position_id]"
										class="form-control select2">

									@if(isset($positions))
										@foreach($positions as $position)
											<option
													value="{{$position->id}}"
													{{isset($model)&&$model->position_id==$position->id?'selected':''}}>
												{{$position->name}}
											</option>
										@endforeach
									@endif
								</select>
							</div>

						</div>

						<div class="col-md-6" style="background:#fff;">
							<div class="form-group">
								<label for="">លេខទូរស័ព្ទ</label>
								<input
										type="text"
										name="input[telephone]"
										class="form-control"
										value="{{isset($model)?$model->telephone:''}}">
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input
										type="text"
										name="input[email]"
										class="form-control"
										value="{{isset($model)?$model->email:''}}">
							</div>
							<div class="form-group">
								<label for="">អាស័យដ្ឋាន</label>
								<input
										type="text"
										name="input[address]"
										class="form-control"
										value="{{isset($model)?$model->address:''}}">
							</div>
							<div class="form-group col-md-3">
								<label for="">Active</label></br>
								<input type="checkbox" class=""
									   name="input[active]"
									   value="1"
										{{isset($model)&&$model->active==1? 'checked':''}}>
							</div>

						</div>

							<div class="box-footer col-xs-6">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>

					</form>
				</div>
			</div>
		</div>
		</div>
		<!-- /.row -->
	
	</section>
@endsection

@push('scripts')
	<script>
		$('.select2').select2();
		$('#datepicker1').datepicker({
			format: 'yyyy-mm-dd',
		})
        $('.select2').select2();
        $('#datepicker2').datepicker({
            format: 'yyyy-mm-dd',
        })
        $('.select2').select2();
        $('#datepicker3').datepicker({
            format: 'yyyy-mm-dd',
        })
	</script>
@endpush