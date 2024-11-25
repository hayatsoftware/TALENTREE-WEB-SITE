@section('header')
    <!-- Google tag (gtag.js) -->
    <script async src=https://www.googletagmanager.com/gtag/js?id=G-JW03LE6XZW></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-JW03LE6XZW'); </script>
    @php
        /** @var \Mediapress\Foundation\Mediapress $mediapress */
            $header_menus = $mediapress->menu('header-menu');

        $languages = $mediapress->otherLanguages(1);
        $activeLanguage = $mediapress->activeLanguage();

        $appPage = \Mediapress\Modules\Content\Models\SitemapDetail::where('sitemap_id',APPLICATION_SITEMAP)->where('language_id',$mediapress->activeLanguage->id)->first();

    @endphp

    <header class="header">
        <div class="container-fluid">
            <div class="topHeader">
                <span>{!! langPart("header.top.text","TalenTree, Kastamonu Entegre Ağaç Sanayi ve Ticaret Anonim Şirketi genç yetenek gelişim yolculuğudur.") !!}</span>
            </div>
            <div class="allHeader">
                <div class="logo">
                    <a href="/{{$mediapress->activeLanguage->code}}">
                        <img src="{{asset('assets/img/logo.svg')}}" alt="">
                    </a>
                </div>
                <div class="menuBar">
                    <div class="menu">
                        <ul>
                            @foreach($header_menus as $menu)
                                @if($menu->status != 1) @continue @endif
                                @php
                                    if(is_null($menu->type)){ $url='javascript:void(0);'; }
                                    else{ $url = ($menu->url) ? $menu->url->url : 'javascript:void(0);'; }
                                @endphp
                                @if($menu->type_view==0)

                                        <li>
                                            <span>{!! $menu->name !!}</span>
                                            @if($menu->children->isNotEmpty())
                                                <ul class="submenu" style="display: none;">
                                                    <li class="prev"><i class="fal fa-chevron-left"></i></li>
                                                    @foreach($menu->children as $child)
                                                        @if($child->status != 1) @continue @endif
                                                        @php
                                                            if(!isset($child->url->url)){$child_url = "javascript:void(0);";}
                                                            else{$child_url = $child->url->url;}
                                                        @endphp
                                                        <li><a href="{{strip_tags($child_url)}}">{{strip_tags($child->name)}}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                @else
                                    <li><a href="{{strip_tags($url)}}">{{strip_tags($menu->name)}}</a></li>
                                @endif
                            @endforeach

                        </ul>



                        <div class="mobileLang">
                            @if($activeLanguage)
                                <span><i class="fas fa-globe-europe"></i> {!! ucfirst($activeLanguage->code) !!}</span>
                            @endif
                            <ul>
                                @if($activeLanguage)
                                    <li class="active"><a href="#">{!! ucfirst($activeLanguage->code) !!}</a></li>
                                @endif
                                @foreach($languages as $otherLang)
                                    <li><a href="{{$otherLang['url']}}">{{ucfirst($otherLang['language_code'])}}</a></li>
                                @endforeach
                                <li class="close"><i class="fal fa-times"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="lang">
                        @if($activeLanguage)
                            <span class="bg-blue color-white d-flex align-items-center justify-content-center">{!! ucfirst($activeLanguage->code) !!}</span>
                        @endif
                        <ul>
                            @foreach($languages as $otherLang)
                                <li>
                                    <a href="{{strip_tags($otherLang['url'])}}" >{{strip_tags(ucfirst($otherLang['language_code']))}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="applyBtn">
                        <a href="{{strip_tags($appPage->url->url)}}" class="bg-green color-white rounded-pill d-flex align-items-center justify-content-center"><span>{{strip_tags(langPart("header.application.button.text","Başvur"))}}</span></a>
                    </div>
                    <div class="menuButton bg-blue">
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
