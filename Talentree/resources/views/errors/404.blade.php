
@php
    if(!isset($mediapress)){
    $mediapress = mediapress();
    }

@endphp
@push('styles')
    <link rel="stylesheet" href="{{asset("assets/css/page.css?v=").time()}}">
    <style>
        .footer{
            display: none;
        }

    </style>
@endpush
@extends('web.inc.app')

@section('content')
    <main class="main notFoundPage" id="main">
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
                <div class="pageContent">
                    <div class="allContentPage text-center">
                        <div class="mw-80">
                            <h1>4<i class="fas fa-question-circle"></i>4</h1>
                            <p>{!! langPart('notfoundtext','Ulaşmaya çalıştığınız sayfa hatalı veya kaldırılmış olabilir.') !!}</p>
                            <div class="moreBtnBox">
                                <a href="{!! $mediapress->homePageUrl !!}" class="moreBtn border-green color-black rounded-pill d-inline-flex align-items-center justify-content-center"><small><i class="fal fa-home-lg-alt"></i> {!! langPart('notfoundtexthome','Anasayfaya Git') !!}</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
