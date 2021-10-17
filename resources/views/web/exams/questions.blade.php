@extends('web.master')

@section('title')
    exam - {{$show_exam->name()}}
@endsection

@section('styles')
    <link href="{{ asset('web/css/TimeCircles.css')}}" rel="stylesheet">
@endsection

@section('content')
		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('web/img/blog-post-background.jpg') }})"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="{{url('/')}}">Home</a></li>
							<li><a href="{{ url( 'categories/show', $show_exam->skill->category->id) }}">{{ $show_exam->skill->category->name() }}</a></li>
							<li><a href="{{ url( 'skills/show', $show_exam->skill->id) }}">{{ $show_exam->skill->name() }}</a></li>
							<li>{{ $show_exam->name() }}</li>
						</ul>
						<h1 class="white-text">{{ $show_exam->name() }}</h1>
						<ul class="blog-post-meta">
							<li>{{ Carbon\Carbon::parse($show_exam->created_at)->format('d m, Y') }}</li>
							<li class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> {{$show_exam->users()->count()}}</a></li>
						</ul>
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
					<div id="main" class="col-md-9">


                        <form id="exam-submit-form" action="{{ url('exams/finished', $show_exam->id)}}" method="POST">
                            @csrf
                        </form>

                        <!-- blog post -->
                        <div class="blog-post mb-5">
                            <p>
                                @foreach ($show_exam->questions as $question)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">{{$loop->iteration}} - {{$question->title}}</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answers[{{$question->id}}]" value="1" form="exam-submit-form">
                                                {{$question->option_1}}
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answers[{{$question->id}}]" value="2" form="exam-submit-form">
                                                {{$question->option_2}}
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answers[{{$question->id}}]" value="3" form="exam-submit-form">
                                                {{$question->option_3}}
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="answers[{{$question->id}}]" value="4" form="exam-submit-form">
                                                {{$question->option_4}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </p>
                        </div>
                        <!-- /blog post -->

                        <div>
                            <button type="submit" form="exam-submit-form" class="main-button icon-button pull-left">{{__('lang.end_exam')}}</button>                        </div>
					</div>
					<!-- /main blog -->


					<!-- aside blog -->
					<div id="aside" class="col-md-3">

						<!-- exam details widget -->
                        <ul class="list-group">
                            <li class="list-group-item">{{__('lang.Skill')}}: {{ json_decode($show_exam->skill->name)->en }}</li>
                            <li class="list-group-item">{{__('lang.Questions')}}: {{$show_exam->questions()->count()}}</li>
                            <li class="list-group-item">{{__('lang.Duration')}}: {{$show_exam->durations_mins}} mins</li>
                            <li class="list-group-item">{{__('lang.Difficulty')}}:

                                @for ($i = 1; $i <= $show_exam->difficulty; $i++)
                                <i class="fa fa-star"></i>
                                @endfor
                                @for ($i = 1; $i <= 5 - $show_exam->difficulty; $i++)
                                <i class="fa fa-star-o"></i>
                                @endfor
                            </li>
                        </ul>
						<!-- /exam details widget -->
                        <div class="duration-countdown" data-timer="{{$show_exam->durations_mins *60}}"></div>
					</div>
					<!-- /aside blog -->

				</div>
				<!-- row -->

			</div>
			<!-- container -->

		</div>
		<!-- /Blog -->

@endsection


@section('scripts')
    <script type="text/javascript" src="{{ asset('web/js/TimeCircles.js')}}"></script>

    <script type="text/javascript">
        $(".duration-countdown").TimeCircles({
            time:{
                Days: false,
            },
            count_past_zero: false,
        }).addListener(function(unit, value, total) {
    if(total <= 0) {
        $('#exam-submit-form').submit();
    }
});
    </script>
@endsection
