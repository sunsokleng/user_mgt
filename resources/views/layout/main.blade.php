<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Users Management System</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	{{--include style css from partial folder--}}
	@include('partials.header')
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
	
	@include('partials.main-header')
	<!-- Left side column. contains the logo and sidebar -->
	@include('partials.main-sidebar')
	
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		
		@yield('content')
		<!-- Main content -->
		
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Version</b> 1.0.0
		</div>
		<strong>Copyright &copy; 15-02-2018 <a href="https://adminlte.io">Sun Sokleng</a>.</strong> All rights
		reserved.
	</footer>
	
	<!-- Add the sidebar's background. This div must be placed
		 immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('partials.footer')
@stack('scripts')
</body>
</html>