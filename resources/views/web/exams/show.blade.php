@extends('web.master')

@section('title')
    exam - {{$exam->name()}}
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
							<li><a href="{{url('/')}}">{{__('lang.home')}}</a></li>
							<li><a href="{{ url('categories' , $exam->skill->category->id)}}">{{ $exam->skill->category->name() }}</a></li>
							<li><a href="{{ url('/skills', $exam->skill->id)}}">{{$exam->skill->name()}}</a></li>
							<li>{{$exam->name()}}</li>
						</ul>
						<h1 class="white-text">{{$exam->name()}}</h1>
						<ul class="blog-post-meta">
							<li>{{ Carbon\Carbon::parse($exam->created_at)->format('d m, Y') }}</li>
						</ul>
					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->

		<!-- content -->
		<div id="blog" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- main blog -->
					<div id="main" class="col-md-9">

						<!-- blog post -->
						<div class="blog-post mb-5">
							<p>
                                {{$exam->desc()}}
                            </p>
						</div>
						<!-- /blog post -->

                        <div>
                            @if ($canEnterExam)
                                <form action="{{ url('/exams/start', $exam->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="main-button icon-button pull-left">{{__('lang.start_exam')}}</button>
                                </form>
                            @endif
                        </div>
					</div>
					<!-- /main blog -->

					<!-- aside blog -->
					<div id="aside" class="col-md-3">

						<!-- exam details widget -->
                        <ul class="list-group">
                            <li class="list-group-item">{{__('lang.Skill')}}: {{$exam->skill->name()}}</li>
                            <li class="list-group-item">{{__('lang.Questions')}}:  {{$exam->questions_num}}</li>
                            <li class="list-group-item">{{__('lang.Duration')}}:  {{$exam->durations_mins}} mins</li>
                            <li class="list-group-item">{{__('lang.Difficulty')}}:
                                @for ($i = 1; $i <= $exam->difficulty; $i++)
                                <i class="fa fa-star"></i>
                                @endfor
                                @for ($i = 1; $i <= 5 - $exam->difficulty; $i++)
                                <i class="fa fa-star-o"></i>
                                @endfor
                            </li>
                        </ul>
						<!-- /exam details widget -->



					</div>
					<!-- /aside blog -->

				</div>
				<!-- row -->

			</div>
			<!-- container -->

		</div>
		<!-- /content -->
@endsection
