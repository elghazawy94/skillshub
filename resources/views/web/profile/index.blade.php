@extends('web.master')

@section('title')
    {{__('lang.profile')}}
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
							<li>{{__('lang.profile')}}</li>
						</ul>
						<h1 class="white-text">{{__('lang.profile')}}</h1>

					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->

		<!-- Blog -->
		<div id="blog" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- main blog -->
					<div id="main" class="col-md-12">

						<!-- row -->
						<div class="row">
                            <h3>{{__('lang.welcome')}} ,</h3>
                            <p>{{Auth::user()->name}}</p>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{__('lang.Exam_name')}}</th>
                                    <th>{{__('lang.score')}}</th>
                                    <th>{{__('lang.Time')}} (mins.)</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach ($UserExams as $exam)
                                <tr>
                                    <td><a href="{{url("/exams/$exam->id")}}">{{ json_decode($exam->name)->en }}</a></td>
                                    <td>{{$exam->pivot->score}}</td>
                                    <td>{{$exam->pivot->time_mins}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

						</div>
						<!-- /row -->
					</div>
					<!-- /main blog -->



				</div>
				<!-- row -->

			</div>
			<!-- container -->

		</div>
		<!-- /Blog -->
@endsection
