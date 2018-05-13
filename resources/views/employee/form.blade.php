@extends('layout.main')
@section('content')
	<section class="content-header">
		<h1>
			National User
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> National User Info</a></li>
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
					<form role="form" method="post" action="{{url('/nationaluser/save')}}" enctype="multipart/form-data">
						
						{{csrf_field()}}
						@if(isset($model))
							<input type="hidden" name="id" value="{{$model->id}}">
						@endif
						<div style="clear:both;">
						<div class="col-md-6" style="background:#fff;">
							<div class="form-group">
								<label for="">National</label>
								<select
										name="input[national_id]"
										class="form-control select2">

									@if(isset($nationals))
										@foreach($nationals as $national)
											<option
													value="{{$national->id}}"
													{{isset($model)&&$model->national_id==$national->id?'selected':''}}>
												{{$national->name}}
											</option>
										@endforeach
									@endif
								</select>
							</div>
							<div class="form-group">
								<label for="">English Name ឈ្មោះឡាតាំង</label>
								<input
										type="text"
										name="input[englishname]"
										class="form-control"
										value="{{isset($model)?$model->englishname:''}}" >
							</div>
							<div class="form-group">
								<label for="">Khmer Name ឈ្មោះអក្សរខ្មែរ</label>
								<input
										type="text"
										name="input[khmername]"
										class="form-control"
										value="{{isset($model)?$model->khmername:''}}">
							</div>
							<div class="form-group">
								<label for="">User Name ឈ្មោះក្នុងប្រព័ន្ធ</label>
								<input
										type="text"
										name="input[username]"
										class="form-control"
										value="{{isset($model)?$model->username:''}}">
							</div>
							<div class="form-group">
								<label for="">Alias Name</label>
								<input
										type="text"
										name="input[aliasname]"
										class="form-control"
										value="{{isset($model)?$model->aliasname:''}}">
							</div>
							<div class="form-group">
								<label for="">Position</label>
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
							<div class="form-group">
								<label for="">Office Name</label>
								<select
										name="input[officename_id]"
										class="form-control select2">

									@if(isset($officenames))
										@foreach($officenames as $officename)
											<option
													value="{{$officename->id}}"
													{{isset($model)&&$model->officename_id==$officename->id?'selected':''}}>
												{{$officename->name}}
											</option>
										@endforeach
									@endif
								</select>
							</div>
							<div class="form-group">
								<label for="">Modules</label>
								<input
										type="text"
										name="input[modules]"
										class="form-control"
										value="{{isset($model)?$model->modules:''}}">
							</div>
						</div>

						<div class="col-md-6" style="background:#fff;">
							<div class="form-group">
								<label for="">Telephone</label>
								<input
										type="text"
										name="input[telephone]"
										class="form-control"
										value="{{isset($model)?$model->telephone:''}}">
							</div>
							<div class="form-group">
								<label for="">Date First Update</label>
								<input
										type="text"
										id="datepicker2"
										name="input[date_firstupdate]"
										value="{{isset($model)?$model->date_firstupdate:null}}"
										class="form-control">
							</div>
							<div class="form-group">
								<label for="">Date Second Update</label>
								<input
										type="text"
										id="datepicker3"
										name="input[date_secondupdate]"
										value="{{isset($model)?$model->date_secondupdate:''}}"
										class="form-control">
							</div>
							<div class="form-group col-md-3">
								<label for="">Image</label>
								<input type="file" id="image" name="image" >
								@if (isset($model))
									<img src="{{asset('storage/'.$model->image)}}" style="width: 100px" alt="">
								@endif
							</div>
							<div class="form-group col-md-3">
								<label for="">Active</label></br>
								<input type="checkbox" class=""
									   name="input[active]"
									   value="1"
										{{isset($model)&&$model->active==1? 'checked':''}}>
							</div>
							<div class="form-group">
								<table class="table table-bordered">
									<thead>
									<th>Module</th>
									<th>Role</th>
									<th style="text-align: center" width="30px"><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
									</thead>
									<tbody>
									@if(isset($model)&&!empty($model->userModuleRoles))
										@foreach($model->userModuleRoles as $userModuleRole)
											<tr>
												<td>
													<select
															name="module[]"
															class="form-control module">
														@if(isset($modules))
															@foreach($modules as $module)
																<option
																		value="{{$module->id}}"
																		{{isset($model)&&$userModuleRole->module_id==$module->id?'selected':''}}>
																	{{$module->name}}
																</option>
															@endforeach
														@endif
													</select>
												</td>
												<td>
													<select
															name="role[]"
															class="form-control role">
														@if(isset($roles))
															@foreach($roles as $role)
																<option
																		value="{{$role->id}}"
																		{{isset($model)&&$userModuleRole->role_id==$role->id?'selected':''}}>
																	{{$role->name}}
																</option>
															@endforeach
														@endif
													</select>
												</td>
												<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i> </a> </td>
											</tr>
										@endforeach
									@else
										<tr>
											<td>
												<select
														name="module[]"
														class="form-control module">
													@if(isset($modules))
														@foreach($modules as $module)
															<option
																	value="{{$module->id}}"
																	{{isset($model)&&$userModuleRole->module_id==$module->id?:''}}>
																{{$module->name}}
															</option>
														@endforeach
													@endif
												</select>
											</td>
											<td>
												<select
														name="role[]"
														class="form-control role">
													@if(isset($roles))
														@foreach($roles as $role)
															<option
																	value="{{$role->id}}"
																	{{isset($model)&&$userModuleRole->role_id==$role->id?:''}}>
																{{$role->name}}
															</option>
														@endforeach
													@endif
												</select>
											</td>
											<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i> </a> </td>
										</tr>
									@endif


									</tbody>

								</table>
							</div>


						</div>
							<div class="form-group col-md-12">
								<label>Comments:</label>
								<textarea
										class="form-control"
										name="input[comments]"
										rows="5"
								>{{isset($model)?$model->comments:''}}</textarea>
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

		$(document).ready(function() {
            $('.multiple').select2();
        })

		$('.addRow').on('click', function(){
		    addRow();
		});
		function addRow()
		{
			var tr= '<tr>'+
						'<td>'+
						'<select name="module[]" class="form-control module">'+
						'@if(isset($modules))'+
						'@foreach($modules as $module)'+
						'<option value="{{$module->id}}"'+
						'		{{isset($model)&&$model->module_id==$module->id?'selected':''}}>'+
						'		{{$module->name}} </option>'+
						'@endforeach'+
					 	'@endif'+
						'</select>'+
						'</td>'+
						'<td>'+
						'<select name="role[]" class="form-control role">'+
						'@if(isset($roles))'+
						'@foreach($roles as $role)'+
						'<option value="{{$role->id}}" {{isset($model)&&$model->role_id==$role->id?'selected':''}}> {{$role->name}} </option>'+
						'@endforeach'+
						'@endif'+
						'</select>'+
						'</td>'+
						'<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i> </a> </td>'+
					'</tr>';
			$('tbody').append(tr);
            $('.remove').on('click', function () {
                var l=$('tbody tr').length;
                if(l>1){
                    $(this).parent().parent().remove();
                }
            });
        };
        $('.remove').on('click', function () {
            var l=$('tbody tr').length;
            if(l>1){
                $(this).parent().parent().remove();
            }
        });



	</script>


@endpush