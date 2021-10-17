<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>{{ env('APP_NAME') }} | @yield('title')</title>
        <link rel="icon" type="image/png" href="{{asset('web/favicon.png')}}"/>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{asset('web/css/bootstrap.min.css')}}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ asset('web/css/font-awesome.min.css')}}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('web/css/style.css')}}"/>


        @yield('styles')

    </head>
	<body>

		<!-- Header -->
		<header id="header">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a class="logo" href="{{ url('/')}}">
							<img src="{{ asset('web/img/logo.png')}}">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Mobile toggle -->
					<button class="navbar-toggle">
						<span></span>
					</button>
					<!-- /Mobile toggle -->
				</div>

				<!-- Navigation -->
                <x-navbar></x-navbar>
				<!-- /Navigation -->

			</div>
		</header>
		<!-- /Header -->

        @yield('content')

        <!-- Footer -->
		<footer id="footer" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div id="bottom-footer" class="row">

					<!-- social -->
					<div class="col-md-4 col-md-push-8">
						<x-social-links></x-social-links>
					</div>
					<!-- /social -->

					<!-- copyright -->
					<div class="col-md-8 col-md-pull-4">
						<div class="footer-copyright">
							<span>&copy; Copyright 2021. All Rights Reserved. | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">SkillsHub</a></span>
						</div>
					</div>
					<!-- /copyright -->

				</div>
				<!-- row -->

			</div>
			<!-- /container -->

		</footer>
		<!-- /Footer -->

		<!-- preloader -->
		<div id='preloader'><div class='preloader'></div></div>
		<!-- /preloader -->

		<!-- jQuery Plugins -->
		<script type="text/javascript" src="{{ asset('web/js/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('web/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('web/js/main.js') }}"></script>
        <script type="text/javascript">
            $('#logout-link').click(function (e) {
                e.preventDefault();
                $('#logout-form').submit()
            });
        </script>
        @yield('scripts')
	</body>
</html>
