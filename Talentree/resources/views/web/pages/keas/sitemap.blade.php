@extends('web.inc.app')
@push('styles')
    <link rel="stylesheet" href="{!! asset("assets/css/fancybox.css?v=").time() !!}">
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
                    <img src="{{image($sitemap->f_image_1)}}" alt="{{$sitemap->detail->name}}">
                </div>
            </div>
            <div class="otherStep">
                <div class="container-fluid">
                    <div class="mw-80 text-center">
                        <div class="contentPage mtMini">
                            <div class="itemsList">
                                <div class="numberedPage">
                                    <ul class="m-0 p-0 d-flex justify-content-center">
                                        <li class="d-flex align-items-center justify-content-center w-50"><span
                                                class="counters">{{strip_tags($sitemap->detail->workers)}}</span> <i
                                                class="d-flex align-items-center h-100">{!! langPart('keas.workers','Toplam Çalışan') !!}</i></li>
                                        <li class="d-flex align-items-center justify-content-center w-50"><span class="counters">{{strip_tags($sitemap->detail->country)}}</span> <i class="d-flex align-items-center h-100">{!! langPart('keas.country','Ülke') !!}</i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="itemsList">
                                <p><img src="{{image($sitemap->f_logo_1)}}" alt=""></p>
                                <div class="pageTitle">
                                    <h2>{{strip_tags($sitemap->detail->title_1)}}</h2>
                                    {!!$sitemap->detail->text_1!!}
                                </div>
                            </div>
                            <div class="itemsList">
                                <div class="banner">
                                    <img src="{{image($sitemap->f_image_2)}}" class="cover" alt="">
                                </div>
                                <div class="pageTitle">
                                    <div class="pageTitle">
                                        <h2>{{strip_tags($sitemap->detail->title_2)}}</h2>
                                        {!!$sitemap->detail->text_2!!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="presentationBox mtMini">
                <div class="container-fluid">
                    <div class="fullBoxes bg-blue position-relative">
                        <div class="allContent text-center color-white">
                            <div class="title">
                                <h2>{{strip_tags($sitemap->detail->title_3)}}</h2>
                            </div>
                            <div class="content mw-800">
                                {!! $sitemap->detail->text_3 !!}
                            </div>
                            <div class="imgAndVideo">
                                <div class="item">
                                    <a href="{{$sitemap->detail->video_1}}" data-fancybox>
                                        <picture>
                                            <img src="{{image($sitemap->f_image_3)}}" class="img-fluid" alt="">
                                        </picture>
                                        <i class="fas fa-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <span class="miniLiner" id="line1"></span>
                        <span class="miniLiner" id="line2"></span>
                        <span class="miniLiner" id="line3"></span>
                        <span class="miniLiner" id="line4"></span>
                        <span class="miniLiner" id="line5"></span>
                    </div>
                </div>
            </div>
            <div class="otherStep">
                <div class="container-fluid">
                    <div class="mw-80 text-center">
                        <div class="contentPage">
                            <div class="itemsList">
                                <div class="pageTitle">
                                    <h2>{{strip_tags($sitemap->detail->title_4)}}</h2>
                                    {!!$sitemap->detail->text_4!!}
                                </div>
                                <div class="featuresList">
                                    <ul>
                                        @foreach($principles as $principle)
                                            <li><img src="{{image($principle->f_cover)}}" alt=""> {{strip_tags($principle->detail->name)}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="itemsList">
                                <div class="imgAndVideo m-0">
                                    <div class="item">
                                        <a href="{{$sitemap->detail->video_2}}" data-fancybox>
                                            <picture>
                                                <img src="{{image($sitemap->f_image_4)}}" class="img-fluid" alt="">
                                            </picture>
                                            <i class="fas fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="itemsList">
                                <div class="pageTitle">
                                    <h2>{{strip_tags($sitemap->detail->title_5)}}</h2>
                                    {!!$sitemap->detail->text_5!!}
                                </div>
                                <div class="banner">
                                    <img src="{{image($sitemap->f_image_5)}}" alt="" class="cover">
                                </div>
                            </div>
                        </div>
                        <div class="moreBtnBox text-center">
                            <a href="{{$sitemap->detail->link_1}}" target="_blank" class="moreBtn bg-green color-white rounded-pill d-inline-flex align-items-center justify-content-center"><small> <i class="fal fa-link"></i> {!! langPart('keas.viewmore','Daha Fazlasını Keşfet') !!}</small></a>
                        </div>
                    </div>
                </div>
            </div>
            @include("web.inc.application")
        </section>
    </main>
@endsection
@push('scripts')
    <script type="text/javascript" src="{!! asset("assets/js/fancybox.js?v=").time() !!}"></script>
    <script type="text/javascript" src="{!! asset("assets/js/program.js?v=").time() !!}"></script>
@endpush
