@extends('web.master')

@section('title')
    skills - {{$skills->name()}}
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
							<li><a href="{{ url('/')}}">{{__('lang.home')}}</a></li>
							<li><a href="{{ url("/categories/$skills->category_id")}}">{{ $skills->category->name() }}</a></li>
							<li>{{$skills->name()}}</li>
						</ul>
						<h1 class="white-text">{{$skills->name()}}</h1>
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

					<!-- main content -->
					<div id="main" class="col-md-9">

						<!-- row -->
						<div class="row">

                            @foreach ($skills->exams as $exam)
                                <div class="col-md-4">
                                    <div class="single-blog">
                                        <div class="blog-img">
                                            <a href="{{ url("/exams/$exam->id")}}">
                                                <img src="{{ asset("/uploads/$exam->img")}}" alt="">
                                            </a>
                                        </div>
                                        <h4><a href="{{ url("/exams/$exam->id")}}">{{$exam->name()}}</a></h4>
                                        <div class="blog-meta">
                                            <span>{{ Carbon\Carbon::parse($exam->created_at)->format('d m, Y') }}</span>
                                            <div class="pull-right">
                                                <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> {{ $exam->users()->count() }} </a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / skills -->

                            @endforeach
						</div>
						<!-- /row -->

					</div>
					<!-- /main blog -->

					<!-- aside blog -->
					<div id="aside" class="col-md-3">

						<!-- search widget -->
						<div class="widget search-widget">
							<form>
								<input class="input" type="text" name="search">
								<button><i class="fa fa-search"></i></button>
							</form>
						</div>
						<!-- /search widget -->

						<!-- category widget -->
						<div class="widget category-widget">
							<h3>{{ __('lang.categories')}}</h3>
                            @foreach ($categories as $cat)
                            <a class="category" href="{{url("/categories/$cat->id")}}">{{ $cat->name()}} <span>{{ $cat->skills->count() }}</span></a>
                            @endforeach
						</div>
						<!-- /category widget -->
					</div>
					<!-- /aside blog -->

				</div>
				<!-- row -->

			</div>
			<!-- container -->

		</div>
		<!-- /Blog -->
@endsection
