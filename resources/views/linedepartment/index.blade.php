@extends('layout.main')
@section('content')
	<section class="content-header">
		<h1>
			Line Department
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Line Department</a></li>
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
								<th>Id</th>
								<th>Name</th>
								<th >Description</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							@if(isset($linedepartments))
								@foreach($linedepartments as $linedepartment)
									<tr>
										<td>{{$linedepartment->id}}</td>
										<td>{{$linedepartment->name}}</td>
										<td>{{$linedepartment->description}}</td>
										<td>
											<a href="{{url('/linedepartment/form/'.$linedepartment->id)}}" class="btn btn-info">Edit</a>
											<a href="{{url('/linedepartment/delete/'.$linedepartment->id)}}" class="btn btn-danger">Delete</a>
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