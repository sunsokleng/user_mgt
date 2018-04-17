@extends('layout.main')
@section('content')
	<section class="content-header">
		<h1>
			History
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> History</a></li>
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
					<form role="form" method="post" action="{{url('/history/save')}}" enctype="multipart/form-data">

						{{csrf_field()}}
						@if(isset($model))
							<input type="hidden" name="id" value="{{$model->id}}">
						@endif
						<div style="clear:both;">
							<div class="col-md-6" style="background:#fff;">
								<div class="form-group">
									<label for="">Location</label>
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
									<label for="">Replace From</label>
									<input
											type="text"
											name="input[englishname]"
											class="form-control"
											value="{{isset($model)?$model->englishname:''}}" >
								</div>

							</div>

							<div class="col-md-6" style="background:#fff;">
								<div class="form-group">
									<label for="">Sub Location</label>
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
									<label for="">Replace To</label>
									<input
											type="text"
											name="input[englishname]"
											class="form-control"
											value="{{isset($model)?$model->englishname:''}}" >
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