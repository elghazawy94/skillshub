@extends('web.master')

@section('title')
{{__('lang.contactus')}}
@endsection

@section('content')
		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('web/img/page-background.jpg')}})"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="{{ url('/')}}">{{__('lang.home')}}</a></li>
							<li>{{__('lang.contact')}}</li>
						</ul>
						<h1 class="white-text">{{__('lang.contact')}}</h1>

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

					<!-- contact form -->
					<div class="col-md-6">
						<div class="contact-form">
							<h4>{{__('lang.msg_title')}}</h4>
                            @include('web.inc.message-ajax')
							<form id="contact-form">
                                @csrf
								<input class="input" type="text" name="name" placeholder="{{__('lang.name')}}">
								<input class="input" type="email" name="email" placeholder="{{__('lang.email')}}">
								<input class="input" type="text" name="subject" placeholder="{{__('lang.subject')}}">
								<textarea class="input" name="message" placeholder="{{__('lang.message')}}"></textarea>
								<button id="contact-form-btn" type="submit" class="main-button icon-button pull-right">{{__('lang.send_msg')}}</button>
							</form>
						</div>
					</div>
					<!-- /contact form -->

					<!-- contact information -->
					<div class="col-md-5 col-md-offset-1">
						<h4>{{__('lang.contact_info')}}</h4>
						<ul class="contact-details">
							<li><i class="fa fa-envelope"></i>{{ $setting->email}}</li>
							<li><i class="fa fa-phone"></i>{{ $setting->phone}}</li>
						</ul>

					</div>
					<!-- contact information -->

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact -->

@endsection

@section('scripts')
<script>
$("#msg-success").hide();
$("#msg-errors").hide();
$("#contact-form-btn").click(function(e) {
    $("#msg-success").hide();
    $("#msg-errors").hide();
    $("#msg-success-text").empty();
    $("#msg-errors-text").empty();
    e.preventDefault();
    let formData = new FormData($('#contact-form')[0]);
    $.ajax({
        type: "POST",
        url: "{{ url('/contact/send') }}",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data)
        {
            $("#msg-success").show();
            $("#msg-success-text").text(data.success);
        }, error: function (xhr, status, error)
        {
            $("#msg-errors").show();
            $.each(xhr.responseJSON.errors, function(key , item)
            {
                $("#msg-errors-text").append("<p>"  + item  + "</p>")
            });
        }
    });
});
</script>
@endsection
