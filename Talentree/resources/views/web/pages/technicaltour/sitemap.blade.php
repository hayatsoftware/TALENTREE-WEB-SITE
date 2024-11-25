@extends('web.inc.app')
@push('styles')
    <link rel="stylesheet" href="{!! asset("assets/css/fancybox.css?v=").time() !!}">
    <link rel="stylesheet" href="{!! asset("assets/css/swiper.css?v=").time() !!}">
    <link rel="stylesheet" href="{!! asset("assets/css/programPage.css?v=").time() !!}">
    <link rel="stylesheet" href="{!! asset("assets/css/page.css?v=").time() !!}">
@endpush
@php
    $sitemap = $mediapress->data['sitemap'];
@endphp

@section('content')
    <main class="main" id="main">
        <section class="section">
            <svg class="svgBox first" width="191" height="136" viewBox="0 0 191 136" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M0 1L190 135" stroke="#5FB157" stroke-width="2" class="svg-elem-1"></path>
            </svg>
            <svg class="svgBox two" width="192" height="137" viewBox="0 0 192 137" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M0 1L191 136" stroke="#5FB157" stroke-width="2" class="svg-elem-2"></path>
            </svg>
            <svg class="svgBox three" width="172" height="122" viewBox="0 0 172 122" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M1 1L171 121" stroke="#5FB157" stroke-width="2" class="svg-elem-3"></path>
            </svg>
            <svg class="svgBox four" width="91" height="67" viewBox="0 0 91 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M1 1L93 66" stroke="#5FB157" stroke-width="2" class="svg-elem-4"></path>
            </svg>
            <div class="container-fluid">
                @include("web.inc.breadcrumb")
                <div class="pageTitle text-center">
                    <h1>{{strip_tags($sitemap->detail->name)}}</h1>
                </div>
                <div class="aboutInternship">
                    <img src="{{image($sitemap->f_cover)}}" alt="{{$sitemap->detail->name}}">
                </div>
                <div class="pageContent text-center mt-5 mt-lg-5 pt-lg-4">
                    <div class="mw-800">
                        {!! $sitemap->detail->detail !!}
                    </div>
                </div>
            </div>
            @include("web.inc.application")
        </section>
    </main>
@endsection
@push('scripts')
    <script type="text/javascript" src="{!! asset("assets/js/fancybox.js?v=").time() !!}"></script>
    <script type="text/javascript" src="{!! asset("assets/js/swiper.js?v=").time() !!}"></script>
    <script type="text/javascript" src="{!! asset("assets/js/program.js?v=").time() !!}"></script>
@endpush
