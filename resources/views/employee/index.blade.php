@extends('layout.main')
@section('content')
<section class="content-header">
	<h1>
		Employee Info
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Employee Info</a></li>
		<li class="active">Index</li>
	</ol>
</section>

<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Bordered Table</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered" id="book-list">
						<thead>
						<tr>
							<th>ឈ្មោះមន្រ្តី</th>
							<th >ភេទ</th>
							<th>មុខតំណែង</th>
							<th>លេខទូរស័ព្ទ</th>
							<th>Email</th>
							<th>អាស័យដ្ឋាន</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						@if(isset($employees))
							@foreach($employees as $employee)
								<tr>
									<td>{{$employee->name}}</td>
									<td>{{$employee->sex}}</td>
									<td>{{$employee->position_name}}</td>
									<td>{{$employee->telephone}}</td>
									<td>{{$employee->email}}</td>
									<td>{{$employee->address}}</td>
									<td>
										<a href="{{url('/employee/form/'.$employee->id)}}" class="btn btn-info">Edit</a>
										<a href="{{url('/employee/delete/'.$employee->id)}}" class="btn btn-danger">Delete</a>
									</td>
								</tr>
							@endforeach
						@endif
						</tbody>
						
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
	<!-- /.row -->

</section>
@endsection
@push('scripts')
	<script>
		$(document).ready(function () {
			$('#book-list').DataTable()
		})
	</script>
@endpush