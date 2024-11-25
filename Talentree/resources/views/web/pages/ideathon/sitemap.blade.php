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
                    <img src="{{image($sitemap->f_image_1)}}" alt="{{$sitemap->detail->name}}">
                </div>
            </div>
            <div class="presentationBox mtGlobal">
                <div class="container-fluid">
                    <div class="fullBoxes bg-blue position-relative">
                        <div class="allContent text-center color-white">
                            <img src="{{image($sitemap->f_logo_1)}}" class="mb-4 img-fluid" alt="{{$sitemap->detail->name}}">
                            <div class="title">
                                <h2>{{strip_tags($sitemap->detail->title_1)}}</h2>
                            </div>
                            <div class="content mw-800">
                                {!! $sitemap->detail->text_1 !!}
                            </div>
                            <div class="imgAndVideo">
                                <div class="item">
                                    <a href="{{$sitemap->detail->video_1}}" data-fancybox>
                                        <picture>
                                            <img src="{{image($sitemap->f_image_2)}}" class="img-fluid" alt="">
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
            <div class="imageGalleryBox mtGlobal">
                <div class="container-fluid">
                    <div class="title text-center">
                        <h2>{!! langPart('from.ideathon','TalenTree Ideathon’dan') !!}</h2>
                    </div>
                    @php $disImgCount = 0; @endphp
                    <div class="listing">
                        <div class="row">
                            <div class="col-sm-6 cols_1">
                                @foreach($sitemap->f_gallery as $image)
                                    @if($disImgCount==0)
                                        <div class="item">
                                            <a href="{{image($image)}}" data-fancybox>
                                                <img class="lazy cover" src="{{asset('assets/img/load.svg')}}" data-src="{{ image($image) }}" alt="">
                                            </a>
                                        </div>

                            </div>
                            <div class="col-sm-6 cols_2">
                                <div class="row">
                                    @else
                                        @if($disImgCount<5)

                                            <div class="col-sm-6 cols">
                                                <div class="item">
                                                    <a href="{{ image($image) }}" data-fancybox>
                                                        <img class="lazy cover" src="{{asset('assets/img/load.svg')}}" data-src="{{ image($image) }}" alt="">
                                                    </a>
                                                </div>
                                            </div>

                                        @endif
                                    @endif

                                    @php $disImgCount++; @endphp
                                    @endforeach


                                </div>
                            </div>
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
    <script type="text/javascript" src="{!! asset("assets/js/swiper.js?v=").time() !!}"></script>
    <script type="text/javascript" src="{!! asset("assets/js/program.js?v=").time() !!}"></script>
@endpush
