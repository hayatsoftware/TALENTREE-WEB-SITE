@extends('web.inc.app')
@push('styles')
    <link rel="stylesheet" href="{!! asset("assets/css/fancybox.css?v=").time() !!}">
    <link rel="stylesheet" href="{!! asset("assets/css/swiper.css?v=").time() !!}">
    <link rel="stylesheet" href="{!! asset("assets/css/discoverUs.css?v=").time() !!}">
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
            </div>
            <div class="aboutSliderPage">
                <div class="container-fluid">
                    <div class="listing swiper" style="opacity: 0;">
                        <div class="arrowBox" id="aboutGalleryArrow">
                            <i class="fal fa-arrow-left left"></i>
                            <i class="fal fa-arrow-right right"></i>
                        </div>
                        <div class="swiper-wrapper">
                            @foreach($slider->scenes as $slide)
                                @php
                                    $detail = $slide->detail;
                                    $slide = new \Mediapress\Modules\Content\Foundation\Slide([
                                        'time'=> $slide->time,
                                        'texts'=> $detail->texts,
                                        'buttons'=> $detail->buttons,
                                        'files'=> $detail->files,
                                        'url'=> $detail->url,
                                    ]);
                                @endphp

                                <div class="swiper-slide">
                                    <div class="item">
                                        <a href="{{image($slide->image()->url)}}" data-fancybox>
                                            <picture>
                                                <img src="{{image($slide->image()->url)}}" class="cover" alt="">
                                            </picture>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="socialAnnouncement mtMini">
                <div class="container-fluid">
                    <div class="all text-center">
                        <p>{!! langPart('socialmedia.text','Etkinlik duyurularımızı Linkedin ve Instagram <br>adreslerimizden takip edebilirsiniz.') !!}</p>
                        @if($sitemap->detail->linkedin_link)
                            <a href="{{$sitemap->detail->linkedin_link}}" target="_blank" aria-label="Social Media - TalenTree"><i class="fab fa-linkedin"></i> {{strip_tags($sitemap->detail->linkedin_name)}}</a>
                        @endif
                        @if($sitemap->detail->instagram_link)
                            <a href="{{$sitemap->detail->instagram_link}}" target="_blank" aria-label="Social Media - TalenTree"><i class="fab fa-instagram"></i> {{strip_tags($sitemap->detail->instagram_name)}}</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="imageGalleryBox mtMini">
                <div class="container-fluid">
                    <div class="listing">
                        <div class="row">
                            @php $galleryCount = 0; @endphp
                            @foreach($gallery[0] as $image)

                                @if($galleryCount==0)

                                    <div class="col-sm-6 cols_1">
                                        <div class="item">
                                            <a href="{{image($image)}}" data-fancybox="galeri1">
                                                <img class="lazy cover" src="{{image('assets/img/load.svg')}}" data-src="{{image($image)}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 cols_2">
                                        <div class="row">
                                @else
                                            <div class="col-sm-6 cols">
                                                <div class="item">
                                                    <a href="{{image($image)}}" data-fancybox="galeri1">
                                                        <img class="lazy cover" src="{{image('assets/img/load.svg')}}" data-src="{{image($image)}}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                @endif

                                @php $galleryCount++; @endphp
                            @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(count($gallery)>1)

                        <div class="listing">
                            <div class="row">
                                @php $galleryCount = 0; @endphp

                                <div class="col-sm-6 cols_2">
                                    <div class="row">

                                        @foreach($gallery[1] as $image)
                                            @if($galleryCount<5)
                                                <div class="col-sm-6 cols">
                                                    <div class="item">
                                                        <a href="{{image($image)}}" data-fancybox="galeri1">
                                                            <img class="lazy cover" src="{{image('assets/img/load.svg')}}" data-src="{{image($image)}}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            @else
                                            </div></div><div class="col-sm-6 cols_1">
                                                    <div class="item">
                                                        <a href="{{image($image)}}" data-fancybox="galeri1">
                                                            <img class="lazy cover" src="{{image('assets/img/load.svg')}}" data-src="{{image($image)}}" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif

                                        @endforeach
                                        @if(count($gallery[1])<5)
                                            {!! '</div></div>' !!}
                                        @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @include("web.inc.application")
        </section>
    </main>
@endsection
@push('scripts')
    <script type="text/javascript" src="{!! asset("assets/js/fancybox.js?v=").time() !!}"></script>
    <script type="text/javascript" src="{!! asset("assets/js/swiper.js?v=").time() !!}"></script>
    <script type="text/javascript" src="{!! asset("assets/js/discoverUs.js?v=").time() !!}"></script>
@endpush