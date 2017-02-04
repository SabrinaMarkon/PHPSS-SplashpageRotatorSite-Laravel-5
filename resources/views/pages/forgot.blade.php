@extends('layouts.main')

@section('heading')


@stop


@section('content')

    <br><br>
    <div class="blacktransparent">
        <div class="title">
            Forgot Your Login?
        </div>
    </div>

    @if(Session::has('page'))
        {!! Session::get('page')->htmlcode !!}
    @endif

    <div class="form-page-small">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        @if (Session::has('errors'))
            <div class="alert alert-danger">{{ Session::get('errors') }}</div>
        @endif

        <div class="form">
            <form class="small-form" role="form" method="post" action="{{ url('/forgot') }}">
                {{ csrf_field() }}
                <input name='forgotemail' type="text" placeholder="your email" value="{{ old('forgotemail') }}"/>
                <button>email login</button>
                <p class="message"><a href="{{ url('login') }}">Return</a></p>
            </form>
        </div>
    </div>
    
@stop


@section('footer')



@stop