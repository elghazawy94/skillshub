@extends('web.master')


@section('title')
{{__('lang.restpassword')}}
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
							<li><a href="{{ url('/register')}}">{{__('lang.register')}}</a></li>
						</ul>
						<h1 class="white-text">{{__('lang.restpassword')}}</h1>

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
							<h4>{{__('lang.restpassword')}}</h4>
                            @include('web.inc.message-input')
							<form method="POST" action="{{ url('/reset-password') }}">
                                @csrf
								<input class="input" type="email" name="email" placeholder="{{__('lang.email')}}">
                                <input type="hidden" name="token" value="{{request()->route('token')}}">
								<input class="input" type="password" name="password" placeholder="{{__('lang.password')}}">
								<input class="input" type="password" name="password_confirmation" placeholder="{{__('lang.repassword')}}">
								<button type="submit" class="main-button icon-button pull-right">{{__('lang.restpassword')}}</button>
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
