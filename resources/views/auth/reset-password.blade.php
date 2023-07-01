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
		<title> Reset Password </title>

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
	<body class="main-body bg-light  login-img">

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{ asset('virtual/assets/img/loaders/loader-4.svg') }}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- page -->
		<div class="page">

<!-- main-signin-wrapper -->
<div class="my-auto page page-h">
	<div class="main-signin-wrapper">
		<div class="main-card-signin d-md-flex wd-100p">
		<div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white" >
			<div class="my-auto authentication-pages">
				<div>
				<img src="{{ asset('virtual/assets/img/brand/polindra.png') }}" class=" m-0 mb-3" alt="logo" width="90">
				<h4 class="mb-1">Sistem Monitoring</h4>
				<h4 class="mb-2.5">Barrier Pintu Parkir</h4>
				<p class="text-justify" style="font-size: 16px">Sebuah sistem yang menyediakan informasi dan laporan terkait data parkir di kampus Politeknik Negeri Indramayu</p>	
				</div>
			</div>
		</div>
		<div class="sign-up-body wd-md-50p">
			<div class="main-signin-header">
				<div class="">
					<h2>Selamat datang kembali!</h2>
					<h4 class="text-start">Reset Password Anda</h4>
					<form>
						<div class="form-group text-start">
							<label for="pb">Password Baru</label>
							<input class="form-control" placeholder="Masukan Password Baru Anda" type="password" id="pb">
						</div>
						<div class="form-group text-start">
							<label for="kp">Konfirmasi Password</label>
							<input class="form-control" placeholder="Masukan Ulang Password Baru Anda" type="password" id="kp">
						</div>
						<button class="btn ripple btn-primary btn-block">Reset Password</button>
					</form>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<!-- /main-signin-wrapper -->
</div>
		<!-- page closed -->
		<!-- /main-signin-wrapper -->

		<!--- JQuery min js --->
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

		<script>
			$(document).ready(function () {
				let type = false;
				if('{{session()->has("success")}}' == true) type = "success";
				if('{{session()->has("warning")}}' == true) type = "warning";
				if('{{session()->has("error")}}' == true) type = "error";

				if(type === "success"){
					$.growl.notice1({
						message: `{{ Session::get('success') }}`
					});
				}else if(type === "warning") {
					$.growl.warning({
						message: `{{ Session::get('warning') }}`
					});
				}else if(type === "error") {
					$.growl.error({
						message: `{{ Session::get('error') }}`
					});
				}
			});
		</script>

	</body>
</html>