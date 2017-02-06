@extends('layouts.main')

@section('heading')


@stop


@section('content')

    <br><br>
    <div class="blacktransparent ea-bottompaddingfat">
        <div class="title">
            Member Login
        </div>
    </div>

    @if(Session::has('page'))
        {!! Session::get('page')->htmlcode !!}
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                @if (Session::has('message'))
                    <div class="alert alert-danger ea-bottompaddingfat">{{ Session::get('message') }}</div>
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger ea-bottompaddingfat">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/login') }}" method="post" accept-charset="utf-8" class="form" role="form">

                    {{ csrf_field() }}

                    <label class="sr-only" for="userid">Username</label>
                    <input type="text" id="userid" name="userid" value="{{ old('userid') }}" class="form-control input-lg ea-bottompadding" placeholder="Username">

                    <label class="sr-only" for="password">Password</label>
                    <input type="password" id="password" name="password" value="" class="form-control input-lg ea-bottompadding" placeholder="Password">

                    <span class="help-block ea-bottompadding"><a href="{{ url('forgot') }}">Forgot Password?</a></span>

                    <button class="btn btn-lg btn-custom" type="submit" id="login_button" name="login">Login</button>

                </form>

                <div class="ea-bottompadding"></div>

            </div>
        </div>
    </div>

@stop


@section('footer')


@stop
