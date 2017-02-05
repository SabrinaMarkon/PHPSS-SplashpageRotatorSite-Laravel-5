@extends('layouts.main')

@section('heading')


@stop


@section('content')

    <br><br>
    <div class="blacktransparent">
        <div class="title">
            @if(!Session::has('page'))
                404 Page Not Found
            @endif
        </div>
    </div>

    @if(Session::has('page'))
        {!! Session::get('page')->htmlcode !!}
    @endif

@stop


@section('footer')



@stop