@extends('web.master')


@section('title')
{{ __('lang.login')}}
@endsection

@section('content')

		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('uploads/exams/exam1.jpg') }})"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="{{url('/')}}">{{__('lang.home')}}</a></li>
							<li>{{__('lang.login')}}</li>
						</ul>
						<h1 class="white-text">{{ __('lang.login_desc')}}</h1>
					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->

		<!-- Contact -->
		<div id="contact" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- login form -->
					<div class="col-md-6 col-md-offset-3">
						<div class="contact-form">
							<h4>{{__('lang.login')}}</h4>
                            @include('web.inc.message-input')
							<form method="POST" action="{{ url('/login') }}">
                                @csrf
								<input class="input" type="email" name="email" placeholder="{{__('lang.email')}}">
								<input class="input" type="password" name="password" placeholder="{{__('lang.password')}}">
                                <input type="checkbox" name="remember"> {{__('lang.rememberme')}}
                                <br>
                                <a href="/forgot-password">{{__('lang.forgotpassword')}}</a>
                                <br>
								<button type="submit" class="main-button icon-button pull-right">{{__('lang.login')}}</button>
							</form>
						</div>
					</div>
					<!-- /login form -->

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact -->
@endsection
