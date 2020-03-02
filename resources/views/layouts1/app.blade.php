<!DOCTYPE html>
<html lang="en">
<head>
	@include('layouts1.head')
</head>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
	@include('layouts1.header')
	@include('layouts1.sidebar')
	@section('main-content')
		@show
	@include('layouts1.footer')
</div>
</body>
</html>
