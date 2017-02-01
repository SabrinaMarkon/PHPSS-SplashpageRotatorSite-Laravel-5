@extends('layouts.main')

@section('heading')


@stop


@section('content')

    <br><br>
    <div class="blacktransparent">
        <div class="title">
            About Us
        </div>
    </div>

    @if(Session::has('page'))
        {!! Session::get('page')->htmlcode !!}
    @endif

@stop


@section('footer')



@stop