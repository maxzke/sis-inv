<html lang="en">
	<!--begin::Head-->
	<head>
    <meta charset="utf-8" />
    <title>TPV | Login</title>
    <meta name="description" content="Page with empty content" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--begin::Page Custom Styles(used by this page)-->
		<link href="{{ asset('assets') }}/css/pages/users/login-2.css" rel="stylesheet" type="text/css" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('assets') }}/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('assets') }}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('assets') }}/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <!-- Styles -->
    <!-- <script src="{{ mix('js/app.js') }}" defer></script> -->
    </head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" 
    class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading"
    style="height: 100%; background-color:#fff;">
		<div class="container">
			<div class="row mt-2">
				<div class="col-md-12">
					<div class="d-flex flex-center">
								<img src="assets/media/unpa.png" class="max-h-300px" alt="" />
						</div>
				</div>
			</div>
		</div>
		<!--begin::Div#app-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
			<div class="login login-signin-on login-2 d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div>
								<h1 class="text-dark">Iniciar Sesión</h1>
								<h5 class="mt-5 mb-4 text-warning">Sistema de Inventarios</h5>
							</div>
							<form method="POST" action="{{ route('login') }}" class="margin-t">
                            	@csrf
								<div class="form-group">
									<input class="form-control h-auto text-dark placeholder-dark opacity-100 bg-dark-o-30 rounded-pill border-0 py-4 px-8 mb-5" type="email" placeholder="Usuario" name="email" autocomplete="off" />
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-dark placeholder-dark opacity-100 bg-dark-o-30 rounded-pill border-0 py-4 px-8 mb-5" type="password" placeholder="Contraseña" name="password" />
								</div>
								<div class="form-group text-center mt-10">
									<button type="submit" class="btn btn-pill btn-outline-success font-weight-bold opacity-90 px-15 py-3">{{ __('Entrar') }}</button>
								</div>
							</form>
						</div>
						<!--end::Login Sign in form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
        </div>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
        
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{ asset('assets') }}/plugins/global/plugins.bundle.js"></script>
		<script src="{{ asset('assets') }}/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="{{ asset('assets') }}/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="{{ asset('assets') }}/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM"></script>
		<script src="{{ asset('assets') }}/plugins/custom/gmaps/gmaps.js"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('assets') }}/js/pages/widgets.js"></script>
		<!--begin::Page Scripts(used by Registrar Nuevo Usuario)-->
		<!--end::Page Scripts-->     
	</body>
	<!--end::Body-->
</html>