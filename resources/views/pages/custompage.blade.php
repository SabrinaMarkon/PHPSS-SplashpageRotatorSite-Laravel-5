@extends('layouts.main')

@section('heading')


@stop


@section('content')

    <br><br>
    @if(!Session::has('page'))
        <div class="blacktransparent">
            <div class="title">
                404 Page Not Found
            </div>
        </div>
    @endif

    @if(Session::has('page'))
        <br><br>
        {!! Session::get('page')->htmlcode !!}
    @endif

@stop


@section('footer')



@stop