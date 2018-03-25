@extends('layout.main')
@section('content')
	<section class="content-header">
		<h1>
			Position
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Position</a></li>
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
							@if(isset($positions))
								@foreach($positions as $position)
									<tr>
										<td>{{$position->id}}</td>
										<td>{{$position->name}}</td>
										<td>{{$position->description}}</td>
										<td>
											<a href="{{url('/position/form/'.$position->id)}}" class="btn btn-info">Edit</a>
											<a href="{{url('/position/delete/'.$position->id)}}" class="btn btn-danger">Delete</a>
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