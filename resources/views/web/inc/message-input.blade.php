@if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{session('success')}}
    </div>
@endif

@if ($errors->any())
<div class="alert alert-danger alert-dismissible" role="alert">
    @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
</div>
@endif


@if (session('status'))
<div class="alert alert-success alert-dismissible" role="alert">
        @if (session('status') == 'verification-link-sent')
            A new email verification link has been emailed to you!
        @else
            {{session('status')}}
        @endif
    </div>
@endif
