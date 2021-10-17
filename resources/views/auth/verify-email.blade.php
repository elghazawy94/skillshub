@extends('web.master')

@section('title')
{{__('lang.emailverification')}}
@endsection

@section('content')
		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('web/img/page-background.jpg') }})"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="{{url('/')}}">{{__('lang.home')}}</a></li>
							<li><a href="{{url('/login')}}">{{__('lang.login')}}</a></li>
						</ul>
						<h1 class="white-text">{{__('lang.emailverification')}}</h1>

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
							<h4>{{__('lang.emailverification')}}</h4>

                            @if (!session('status'))
                            <div class="alert alert-warning" role="alert">
                                {{__('lang.resendemail_desc')}}
                            </div>
                            @endif

                            @include('web.inc.message-input')

							<form method="POST" action="{{ url('/email/verification-notification') }}">
                                @csrf
								<button type="submit" class="main-button icon-button pull-right">{{__('lang.resendingemail')}}</button>
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
