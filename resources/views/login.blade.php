<html lang="en">
<!--begin::Head-->

<head>
	<base href="../../../">
	<meta charset="utf-8" />
	<title>NTA | Document Mangement</title>
	<meta name="description" content="Login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link href="{{asset('css/pages/login/classic/login-1.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="assets/media/logos/companylogo.ico" />
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
			<!--begin::Aside-->
			<div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10" style="background-image: url('{{ asset('assets/media/bg/bg-8.jpg')}}">
				<!--begin: Aside Container-->
				<div class="d-flex flex-row-fluid flex-column justify-content-between">
					<!--begin: Aside header-->
					<a href="#" class="flex-column-auto mt-5 pb-lg-0 pb-10">
						<img src="{{asset('assets/media/logos/nta-logo.png')}}" class="max-h-120px" alt="" />
					</a>
					<!--end: Aside header-->
					<!--begin: Aside content-->
					<div class="flex-column-fluid d-flex flex-column justify-content-center">
						<h3 class="font-size-h1 mb-5 text-white">NTA Document Management System</h3>
						
					</div>
					<!--end: Aside content-->
					<!--begin: Aside footer for desktop-->
					<!-- <div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
						<div class="opacity-70 font-weight-bold text-white">© 2021 Metronic</div>
						<div class="d-flex">
							<a href="#" class="text-white">Privacy</a>
							<a href="#" class="text-white ml-10">Legal</a>
							<a href="#" class="text-white ml-10">Contact</a>
						</div>
					</div> -->
					<!--end: Aside footer for desktop-->
				</div>
				<!--end: Aside Container-->
			</div>
			<!--begin::Aside-->
			<!--begin::Content-->
			<div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
				<!--begin::Content body-->
				<div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
					<!--begin::Signin-->
					<form class="kt-form" action="{{route('login')}}" method="post" novalidate="novalidate">
						{{csrf_field()}}
						<div class="login-form login-signin">
							<div class="text-center mb-10 mb-lg-20">
								<h3 class="font-size-h1">Sign In</h3>
								<p class="text-muted font-weight-bold">Enter your username and password</p>
							</div>
							<form class="form" novalidate="novalidate" id="kt_login_signin_form">
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Username" name="username" autocomplete="off" />
								</div>
								<div class="form-group">
									<input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Password" name="password" autocomplete="off" />
								</div>
								<!--begin::Action-->
								<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
									<!-- <a href="javascript:;" class="text-dark-50 text-hover-primary my-3 mr-2" id="kt_login_forgot">Forgot Password ?</a> -->
									<button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Sign In</button>
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
						</div>
					</form>
					<!--end::Signin-->
					<!--begin::Forgot-->
					<div class="login-form login-forgot">
						<div class="text-center mb-10 mb-lg-20">
							<h3 class="font-size-h1">Forgotten Password ?</h3>
							<p class="text-muted font-weight-bold">Enter your email to reset your password</p>
						</div>
						<!--begin::Form-->
						<form class="form" novalidate="novalidate" id="kt_login_forgot_form">
							<div class="form-group">
								<input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Email" name="email" autocomplete="off" />
							</div>
							<div class="form-group d-flex flex-wrap flex-center">
								<button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
								<button type="button" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">Cancel</button>
							</div>
						</form>
						<!--end::Form-->
					</div>
					<!--end::Forgot-->
				</div>
				<!--end::Content body-->
				<!--begin::Content footer for mobile-->
				<div class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
					<div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© 2022 NTA</div>
					<!-- <div class="d-flex order-1 order-sm-2 my-2">
						<a href="#" class="text-dark-75 text-hover-primary">Privacy</a>
						<a href="#" class="text-dark-75 text-hover-primary ml-4">Legal</a>
						<a href="#" class="text-dark-75 text-hover-primary ml-4">Contact</a>
					</div> -->
				</div>
				<!--end::Content footer for mobile-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Login-->
	</div>
	<script>
		var KTAppSettings = {
			"breakpoints": {
				"sm": 576,
				"md": 768,
				"lg": 992,
				"xl": 1200,
				"xxl": 1400
			},
			"colors": {
				"theme": {
					"base": {
						"white": "#ffffff",
						"primary": "#3699FF",
						"secondary": "#E5EAEE",
						"success": "#1BC5BD",
						"info": "#8950FC",
						"warning": "#FFA800",
						"danger": "#F64E60",
						"light": "#E4E6EF",
						"dark": "#181C32"
					},
					"light": {
						"white": "#ffffff",
						"primary": "#E1F0FF",
						"secondary": "#EBEDF3",
						"success": "#C9F7F5",
						"info": "#EEE5FF",
						"warning": "#FFF4DE",
						"danger": "#FFE2E5",
						"light": "#F3F6F9",
						"dark": "#D6D6E0"
					},
					"inverse": {
						"white": "#ffffff",
						"primary": "#ffffff",
						"secondary": "#3F4254",
						"success": "#ffffff",
						"info": "#ffffff",
						"warning": "#ffffff",
						"danger": "#ffffff",
						"light": "#464E5F",
						"dark": "#ffffff"
					}
				},
				"gray": {
					"gray-100": "#F3F6F9",
					"gray-200": "#EBEDF3",
					"gray-300": "#E4E6EF",
					"gray-400": "#D1D3E0",
					"gray-500": "#B5B5C3",
					"gray-600": "#7E8299",
					"gray-700": "#5E6278",
					"gray-800": "#3F4254",
					"gray-900": "#181C32"
				}
			},
			"font-family": "Poppins"
		};
	</script>
	<script src="{{asset('plugins/global/plugins.bundle.js')}}"></script>
	<script src="{{asset('plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
	<script src="{{asset('js/scripts.bundle.js')}}"></script>
	<script src="{{asset('js/pages/custom/login/login-general.js')"></script>
	</body>
</html>