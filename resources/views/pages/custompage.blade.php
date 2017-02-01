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
    @else
        <div class="text-center"><a href="/">Main Page</a></div>
    @endif

@stop


@section('footer')



@stop