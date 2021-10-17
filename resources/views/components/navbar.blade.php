<nav id="nav">
    <form id="logout-form" action="{{ url('logout')}}" method="POST" style="display:none;">
        @csrf
    </form>
    <ul class="main-menu nav navbar-nav navbar-right">
        <li><a href="{{ url('/')}}">{{ __('lang.home')}}</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ __('lang.categories')}} <span class="caret"></span></a>
            <ul class="dropdown-menu">
                @foreach ($categories as $cat)
                    <li><a href="{{ url("categories/$cat->id")}}">{{$cat->name()}}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="{{url('/contact')}}">{{ __('lang.contact')}}</a></li>

        @auth
            @if (Auth::user()->role->is_admin)
                <li><a href="{{ url('dashboard/')}}">{{ __('lang.dashboard')}}</a></li>
            @else
                <li><a href="{{ url('/profile')}}">{{ __('lang.profile')}}</a></li>
            @endif
        @endauth


        @guest
        <li><a href="{{url('/login')}}">{{ __('lang.login')}}</a></li>
        <li><a href="{{url('/register')}}">{{ __('lang.register')}}</a></li>
        @endguest

        @auth
        <li><a id="logout-link" href="#">{{ trans('lang.logout')}}</a></li>
        @endauth

        @if(session()->get('lang') == 'ar')
        <li><a href=" {{ url('lang/set/en') }}">English</a></li>
        @else
        <li><a href=" {{ url('lang/set/ar') }}">عربى</a></li>
        @endif
    </ul>
</nav>
<!-- /Navigation -->
