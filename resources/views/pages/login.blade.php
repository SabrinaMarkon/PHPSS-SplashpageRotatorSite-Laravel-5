@extends('layouts.main')

@section('heading')


@stop


@section('content')

    <br><br>
    <div class="blacktransparent">
        <div class="title">
            Member Login
        </div>
    </div>

    @if(Session::has('page'))
        {!! Session::get('page')->htmlcode !!}
    @endif

@stop


@section('footer')



@stop


@section('content')

    @if (Session::has('message'))
        <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <h1 class="ja-bottompadding">Login</h1>

                <form action="{{ url('/login') }}" method="post" accept-charset="utf-8" class="form" role="form">

                    {{ csrf_field() }}

                    <label class="sr-only" for="userid">Username</label>
                    <input type="text" id="userid" name="userid" value="{{ old('userid') }}" class="form-control input-lg" placeholder="Username">

                    <label class="sr-only" for="password">Password</label>
                    <input type="password" id="password" name="password" value="" class="form-control input-lg" placeholder="Password">

                    <span class="help-block"><a href="{{ url('forgot') }}">Forgot Password?</a></span>

                    <button class="btn btn-lg btn-primary" type="submit" name="login">Login</button>

                </form>

                <div class="ja-bottompadding"></div>

            </div>
        </div>
    </div>
@stop


@section('footer')

@stop