@extends('layouts.main')

@section('heading')


@stop


@section('pagetitle')

@stop


@section('content')

    <div class="ParallaxVideo">
        <div class="overlay">
            <h2>welcome to</h2>
            <h1>EAGLE ADS</h1>
            <h2>targeted Christian advertising</h2>
        </div>
        <video autoplay muted loop poster="http://eagleads.phpsitescripts.com/images/stills/greenmountaincross.jpg" id="bgvideo">
            <source src="http://eagleads.phpsitescripts.com/images/eaglesflight-highquality.mp4" type="video/mp4">
        </video>
    </div>

    @if(Session::has('page'))
        {!! Session::get('page')->htmlcode !!}
    @endif


    <div class="fixed-bg fixed-bg1"></div>

    <!--<div class="whitetransparent"></div><div class="fixed-bg fixed-bg2"><img src="cloud.png" style="margin-top: -20%; width: 100%;"></div>-->
    <div class="whitetransparent"></div>
    <div class="fixed-bg fixed-bg2"></div>
    <div class="whitetransparent"></div>
    <div class="fixed-bg fixed-bg3"></div>

@stop


@section('footer')



@stop