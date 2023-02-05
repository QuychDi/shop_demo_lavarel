<!DOCTYPE html>
<head>
<title>Quan Tri Website</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href="{{asset('fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic')}}" rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
<!-- //font-awesome icons -->
<!-- <link href="{{asset('public/frontend/css/fontawesome.css')}}" rel="stylesheet"> -->
  <link href="{{asset('public/frontend/css/brands.css')}}" rel="stylesheet">
  <link href="{{asset('public/frontend/css/solid.css')}}" rel="stylesheet">
<!-- <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet"> -->
  <!-- <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
  <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet"> -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Sign In Now</h2>

	<?php
use Illuminate\Support\Facades\Session;

$mess = Session::get('message');
if($mess){
	echo "<spand style="."color:". "red>".$mess."</spand>";
	Session::put('message', null);
}
?>
		<form action="{{URL::to('admin/admin-dashboard')}}" method="post">
			{{ csrf_field() }}
			<input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
			<span><input type="checkbox" />Remember Me</span>
			<h6><a href="#">Forgot Password?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="login">
		</form>
		<p>Don't Have an Account ?<a href="registration.html">Create an account</a></p>
</div>
</div>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
