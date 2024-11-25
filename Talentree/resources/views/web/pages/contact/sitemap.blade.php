@extends('web.inc.app')
@push('styles')
    <link rel="stylesheet" href="{!! asset("assets/css/contact.css?v=").time() !!}">
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
                <div class="contactPage">
                    <ul class="contactList  mb-lg-5 mb-4">
                        <li>
                            <img src="{{asset('assets/img/add_call.svg')}}" alt="">
                            <a href="tel:{{str_replace([' '], '', $sitemap->detail->phone)}}">{{strip_tags($sitemap->detail->phone)}}</a>
                        </li>
                        <li>
                            <img src="{{asset('assets/img/mail.svg')}}" alt="">
                            <a href="mailto:{{$sitemap->detail->email}}">{{strip_tags($sitemap->detail->email)}}</a>
                        </li>
                        <li>
                            <img src="{{asset('assets/img/distance-mini.svg')}}" alt="">
                            <p>{{strip_tags($sitemap->detail->address)}}</p>
                        </li>
                    </ul>
                    <div class="contactContent text-center">
                        <div class="all">
                            {!! $sitemap->detail->detail !!}
                            <ul class="social mt-lg-5 mt-4">
                                @foreach(socialMedia() as $social)
                                    <li>
                                        <a href="{!! $social['link']['link'] !!}" target="_blank" aria-label="Social Media - Tümosan"><i
                                                class="fab fa-{!! $social['name'] !!}"></i></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection