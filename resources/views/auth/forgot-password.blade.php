@extends('web.master')

@section('title')
{{__('lang.forgotpassword')}}
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
							<li>{{__('lang.forgotpassword')}}</li>
						</ul>
						<h1 class="white-text">{{__('lang.forgotpassword')}}</h1>

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
							<h4>{{__('lang.forgotpassword')}}</h4>

                            @if (session('status'))
                            <div class="alret alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            @include('web.inc.message-input')

							<form method="POST" action="{{ url('/forgot-password') }}">
                                @csrf
								<input class="input" type="email" name="email" placeholder="{{__('lang.email')}}">
                                <br>
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
