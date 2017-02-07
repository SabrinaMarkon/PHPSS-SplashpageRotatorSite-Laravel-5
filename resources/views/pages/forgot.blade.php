@extends('layouts.main')

@section('heading')


@stop


@section('content')

    <br><br>
    <div class="blacktransparent ea-bottompaddingfat">
        <div class="title">
            Forgot Password?
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

                @if (Session::has('errors'))
                    <div class="alert alert-danger">{{ Session::get('errors') }}</div>
                @endif

                <form action="{{ url('/forgot') }}" method="post" accept-charset="utf-8" class="form" role="form">

                    {{ csrf_field() }}

                    <label class="sr-only" for="forgotemail">Your Email</label>
                    <input type="text" id="forgotemail" name="forgotemail" value="{{ old('forgotemail') }}" class="form-control input-lg ea-bottompadding" placeholder="Your Email">

                    <button class="btn btn-lg btn-custom" type="submit" id="forgot_button" name="forgot">Email Login</button>

                    <br><br><span class="help-block ea-bottompaddingfat"><a href="{{ url('login') }}">Return</a></span>

                </form>

                <div class="ea-bottompadding"></div>

            </div>
        </div>
    </div>

@stop


@section('footer')


@stop

