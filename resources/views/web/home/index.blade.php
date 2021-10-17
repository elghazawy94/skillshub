@extends('web.master')

@section('title')
{{__('lang.home')}}
@endsection

@section('content')
    <!-- Home -->
    <div id="home" class="hero-area">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('web/img/home-background.jpg') }})"></div>
        <!-- /Backgound Image -->

        <div class="home-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="white-text">{{ __('lang.heroTitle')}}</h1>
                        <p class="lead white-text">{{ __('lang.heroTitle_desc')}}</p>
                        <a class="main-button icon-button" href="#">{{ __('lang.heroTitle_btn')}}</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Home -->

    <!-- Courses -->
    <div id="courses" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">
                <div class="section-header text-center">
                    <h2>{{ __('lang.popularExamTitle')}}</h2>
                    <p class="lead">{{ __('lang.popularExam_desc')}}</p>
                </div>
            </div>
            <!-- /row -->

            <!-- courses -->
            <div id="courses-wrapper">

                <!-- row -->
                <div class="row">

                    @foreach ($exam as $exam)
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="{{url("/exams/$exam->id")}}" class="course-img">
                                <img src="{{ asset("/uploads/$exam->img")}}" alt="">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="{{url("/exams/$exam->id")}}">{{$exam->name()}}</a>
                            <div class="course-details">
                                <span class="course-category">{{$exam->skill->name()}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- /row -->

            </div>
            <!-- /courses -->

            <div class="row">
                <div class="center-btn">
                    <a class="main-button icon-button" href="#">{{ __('lang.popularExam_btn')}}</a>
                </div>
            </div>

        </div>
        <!-- container -->

    </div>
    <!-- /Courses -->

    <!-- Contact CTA -->
    <div id="contact-cta" class="section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('web/img/cta.jpg') }})"></div>
        <!-- Backgound Image -->

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <div class="col-md-8 col-md-offset-2 text-center">
                    <h2 class="white-text">{{ __('lang.contactus')}}</h2>
                    <p class="lead white-text">{{ __('lang.contactus_desc')}}</p>
                    <a class="main-button icon-button" href="{{url('/contact')}}">{{ __('lang.contactus_btn')}}</a>
                </div>

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Contact CTA -->

@endsection
