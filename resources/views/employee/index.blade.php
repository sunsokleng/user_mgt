@extends('layout.main')
@section('content')
<section class="content-header">
	<h1>
		National User
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> National User</a></li>
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
							<th>National ID</th>
							<th>English Name</th>
							<th >Khmer Name</th>
							<th>User Name</th>
							<th>Alias Name</th>
							<th>Position</th>
							<th>Telephone</th>

							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						@if(isset($nationalusers))
							@foreach($nationalusers as $nationaluser)
								<tr>
									<td>{{$nationaluser->national->name}}</td>
									<td>{{$nationaluser->englishname}}</td>
									<td>{{$nationaluser->khmername}}</td>
									<td>{{$nationaluser->username}}</td>
									<td>{{$nationaluser->aliasname}}</td>
									<td>{{$nationaluser->position}}</td>
									<td>{{$nationaluser->telephone}}</td>
									<td>
										<a href="{{url('/nationaluser/form/'.$nationaluser->id)}}" class="btn btn-info">Edit</a>
										<a href="{{url('/nationaluser/delete/'.$nationaluser->id)}}" class="btn btn-danger">Delete</a>
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