<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
<meta name="Author" content="Spruko Technologies Private Limited">
<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

<!-- Title -->
<title> Forgot Password </title>

<!--- Favicon --->
<link rel="icon" href="{{ asset('virtual/assets/img/brand/pol-icon.png') }}" type="image/x-icon"/>

<!-- Bootstrap css -->
<link href="{{ asset('virtual/assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" id="style"/>

<!--- Icons css --->
<link href="{{ asset('virtual/assets/css/icons.css') }}" rel="stylesheet">

<!--- Style css --->
<link href="{{ asset('virtual/assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('virtual/assets/css/plugins.css') }}" rel="stylesheet">

<!--- Animations css --->
<link href="{{ asset('virtual/assets/css/animate.css') }}" rel="stylesheet">

</head>
	<body class="main-body app sidebar-mini ltr  login-img">

			<!-- Loader -->
			<div id="global-loader">
				<img src="../assets/img/loaders/loader-4.svg" class="loader-img" alt="Loader">
			</div>
		<!-- /Loader -->

		<!-- page -->
	<div class="page">

		<!-- Main-signin-wrapper -->
		<div class="my-auto page">
			<div class="main-signin-wrapper">
				<div class="main-card-signin forgot-password d-md-flex wd-100p">
					<div class="wd-md-50p  page-signin-style p-md-5 p-4 text-white d-none d-md-block ">
						<div class="my-auto authentication-pages">
							<div>
								<img src="../assets/img/brand/logo-white.png" class=" m-0 mb-4" alt="logo">
								<h5 class="mb-4">Responsive Modern Dashboard &amp; Admin Template</h5>
								<p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
								<a href="index.html" class="btn btn-success">Learn More</a>
							</div>
						</div>
					</div>
					<div class="p-5 wd-md-50p">
						<div class="main-signin-header">
							<h2>Forgot Password!</h2>
							<h4>Please Enter Your Email</h4>
							<form action="{{ route('password.email') }}" method="post">
								@csrf
								<div class="form-group">
									<label>Email</label> <input class="form-control" placeholder="Enter your email" name="email" type="text">
								</div>
								<button type="submit" class="btn btn-primary btn-block">Send</button>
							</form>
						</div>
						<div class="main-signup-footer mg-t-10">
							<p>Forget it, <a href="page-signin.html"> Send me back</a> to the sign in screen.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Main-signin-wrapper -->
	</div>
		<!-- page closed -->

		<script src="{{ asset('virtual/assets/plugins/jquery/jquery.min.js') }}"></script>

		<!--- Bootstrap Bundle js --->
		<script src="{{ asset('virtual/assets/plugins/bootstrap/popper.min.js') }}"></script>
		<script src="{{ asset('virtual/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

		<!--- Ionicons js --->
		<script src="{{ asset('virtual/assets/plugins/ionicons/ionicons.js') }}"></script>

		<!--- Moment js --->
		<script src="{{ asset('virtual/assets/plugins/moment/moment.js') }}"></script>

		<!--- Eva-icons js --->
		<script src="{{ asset('virtual/assets/js/eva-icons.min.js') }}"></script>

		<!--themecolor js-->
		<script src="{{ asset('virtual/assets/js/themecolor.js') }}"></script>

		<!--- Custom js --->
		<script src="{{ asset('virtual/assets/js/custom.js') }}"></script>


		<!-- SHOW PASSWORD JS -->
		<script src="{{ asset('assets/js/show-password.min.js') }}"></script>

		<!-- GENERATE OTP JS -->
		<script src="{{ asset('assets/js/generate-otp.js') }}"></script>

		<!-- Perfect SCROLLBAR JS-->
		<script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

		<!-- Color Theme js -->
		<script src="{{ asset('assets/js/themeColors.js') }}"></script>


		<!-- INTERNAL Notifications js -->
		<script src="{{ asset('assets/plugins/notify/js/rainbow.js') }}"></script>
		<script src="{{ asset('assets/plugins/notify/js/sample.js') }}"></script>
		<script src="{{ asset('assets/plugins/notify/js/jquery.growl.js') }}"></script>
		<script src="{{ asset('assets/plugins/notify/js/notifIt.js') }}"></script>
		<script src="{{ asset('landingpage/js/wow.min.js') }}"></script>
		<script src="{{ asset('landingpage/js/paralax.min.js') }}"></script>
		<script src="{{ asset('landingpage/js/swiper.min.js') }}"></script>
		<script src="{{ asset('landingpage/js/time-circle.js') }}"></script>
		<script src="{{ asset('landingpage/js/skill.bars.jquery.js') }}"></script>
		<script src="{{ asset('landingpage/js/waypoints.min.js') }}"></script>
		<script src="{{ asset('landingpage/js/jquery.counterup.min.js') }}"></script>
		<script src="{{ asset('landingpage/js/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('landingpage/js/main.js') }}"></script>
		<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
		<script src="{{asset('landingpage/js/sweetalert/sweetalert.min.js')}}"></script>

	</body>
</html>