@extends('web.master')


@section('title')
{{ __('lang.register')}}
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
							<li>{{__('lang.register')}}</li>
						</ul>
						<h1 class="white-text">{{ __('lang.register_desc')}}</h1>
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

					<!-- register form -->
					<div class="col-md-6 col-md-offset-3">
						<div class="contact-form">
							<h4>{{__('lang.register')}}</h4>
							<form method="POST" action="{{ url('/register') }}">
                                @csrf
								<input class="input" type="text" name="name" placeholder="{{__('lang.name')}}">
								<input class="input" type="email" name="email" placeholder="{{__('lang.email')}}">
								<input class="input" type="password" name="password" placeholder="{{__('lang.password')}}">
								<input class="input" type="password" name="password_confirmation" placeholder="{{__('lang.repassword')}}">
								<button type="submit" class="main-button icon-button pull-right">{{__('lang.register')}}</button>
							</form>
						</div>
					</div>
					<!-- /register form -->

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact -->
@endsection
