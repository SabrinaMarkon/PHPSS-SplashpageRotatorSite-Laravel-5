@extends('layouts.main')

@section('heading')


@stop


@section('content')

    <br><br>
    <div class="blacktransparent ea-bottompaddingfat">
        <div class="title">
            Register
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
                        <ul class="errorlist text-center">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/join') }}" method="post" accept-charset="utf-8" class="form" role="form">

                    {{ csrf_field() }}

                    <label class="sr-only" for="userid">Username</label>
                    <input type="text" id="userid" name="userid" value="{{ old('userid') }}" class="form-control input-lg ea-bottompadding" placeholder="Username">

                    <label class="sr-only" for="password">Password</label>
                    <input type="password" id="password" name="password" value="" class="form-control input-lg ea-bottompadding" placeholder="Password">

                    <label class="sr-only" for="password_confirm">Confirm Password</label>
                    <input type="password" id="password_confirm" name="password_confirmation" value="" class="form-control input-lg ea-bottompadding" placeholder="Confirm Password">

                    <label class="sr-only" for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" value="{{ old('firstname') }}" class="form-control input-lg ea-bottompadding" placeholder="First Name">

                    <label class="sr-only" for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" class="form-control input-lg ea-bottompadding" placeholder="Last Name">

                    <label class="sr-only" for="email">Email</label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control input-lg ea-bottompadding" placeholder="Email">

                    <button class="btn btn-lg btn-custom" type="submit" id="join_button" name="join">Register</button>

                    <br><br><span class="help-block ea-bottompaddingfat">Already registered? <a href="{{ url('login') }}">Sign In Here</a></span>

                </form>

                <div class="ea-bottompadding"></div>

            </div>
        </div>
    </div>

@stop


@section('footer')


@stop

