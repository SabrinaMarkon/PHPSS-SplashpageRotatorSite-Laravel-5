@extends('layouts.main')

@section('heading')

    <script>
        $(document).ready(function() {
            $('#support-button').on('click', function( e ) {
                window.open('helpdesk');
            });
        });
    </script>

@stop

@section('content')

    <br><br>
    <div class="blacktransparent">
        <div class="title">
            {{--{{ $sitename }}--}} Support
        </div>
    </div>

    @if(Session::has('page'))
        {!! Session::get('page')->htmlcode !!}
        <br><a href="helpdesk" class="btn btn-custom" role="button" target="_blank">Open Helpdesk</a>
    @endif

@stop


@section('footer')



@stop