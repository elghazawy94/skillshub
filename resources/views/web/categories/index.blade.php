@extends('web.master')

@section('title')
{{__('lang.categories')}}
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
							<li>{{$category->name()}}</li>
						</ul>
						<h1 class="white-text">{{$category->name()}}</h1>

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

						<!-- row -->
						<div class="row">

                            @foreach ($skills as $skill)
                                <div class="col-md-4">
                                    <div class="single-blog">
                                        <div class="blog-img">
                                            <a href="{{ url("/skills/$skill->id")}}">
                                                <img src="{{ asset("/uploads/$skill->img")}}" alt="">
                                            </a>
                                        </div>
                                        <h4><a href="{{ url("/skills/$skill->id")}}">{{$skill->name()}}</a></h4>
                                        <div class="blog-meta">
                                            <span>{{ Carbon\Carbon::parse($skill->created_at)->format('d m, Y') }}</span>
                                            <div class="pull-right">
                                                <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> {{ $skill->getStudentsCount() }} </a></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /single skill -->

                            @endforeach
						</div>
						<!-- /row -->

						<!-- row -->
						<div class="row">
                            {{$skills->links('web.inc.paginator')}}
						</div>
						<!-- /row -->
					</div>
					<!-- /main blog -->

					<!-- aside blog -->
					<div id="aside" class="col-md-3">

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
