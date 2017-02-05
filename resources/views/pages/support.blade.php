@extends('layouts.main')

@section('heading')

@stop

@section('content')

    <br><br>
    <div class="blacktransparent">
        <div class="title">
           Support
        </div>
    </div>

    @if(Session::has('page'))
        {!! Session::get('page')->htmlcode !!}
        <br><button id="support-button" class="btn btn-custom" role="button" target="_blank">Open Helpdesk</button>
    @endif

@stop


@section('footer')

    <script>
        $(document).ready(function() {
            $('#support-button').on('click', function( e ) {
                window.open('helpdesk');
            });
        });
    </script>

@stop