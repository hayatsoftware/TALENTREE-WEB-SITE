@section('footer')
    @php
        /** @var \Mediapress\Foundation\Mediapress $mediapress */
        $header_menus = $mediapress->menu('footer-menu');

        $informationPages = \Mediapress\Modules\Content\Models\Page::whereHas('detail')
            ->with(['detail' => function($q) use($mediapress){
                $q->where("language_id", $mediapress->activeLanguage->id);
            },'extras'])
            ->where('pages.sitemap_id',INFORMATIONPAGE_SITEMAP)
            ->where('pages.status',1)
            ->whereNull('pages.deleted_at')
            ->get();


    @endphp
    <footer class="footer bg-blue">
        <div class="container-fluid">
            <div class="centeredBox text-center">
                <img src="{{asset('assets/img/logo-footer.svg')}}" class="mb-4 mb-lg-5" alt="TalenTree">
                <div class="footerFollow">
                    <span>{!! langPart('footer.followme','Bizi Takip Et') !!}</span>
                    <p>{!! langPart('footer.social_text','Kastamonu Entegre’de genç yetenek kariyer fırsatları için bizi <br><a href="#">kastamonuentegre.com</a> web sitemizden ve sosyal medya hesaplarımızdan<br> takip edebilirsin.') !!}</p>
                    @if(count(socialMedia())>0)
                        <ul>
                            @foreach(socialMedia() as $social)
                                <li>
                                    <a href="{!! $social['link']['link'] !!}" target="_blank" aria-label="Social Media - Tümosan"><i
                                            class="fab fa-{!! $social['name'] !!}"></i></a>
                                </li>
                            @endforeach
                        </ul>

                    @endif

                </div>
                <div class="miniMenu">
                    <ul>
                        @foreach($header_menus as $menu)
                            @if($menu->status != 1) @continue @endif
                            @php
                                if(is_null($menu->type)){ $url='javascript:void(0);'; }
                                else{ $url = ($menu->url) ? $menu->url->url : 'javascript:void(0);'; }
                            @endphp
                            @if($menu->type_view==0)

                                <li>
                                    <span>{!! $menu->name !!} <i class="fal fa-plus"></i></span>
                                    @if($menu->children->isNotEmpty())
                                        <ul class="subFooterMenu">
                                            @foreach($menu->children as $child)
                                                @if($child->status != 1) @continue @endif
                                                @php
                                                    if(!isset($child->url->url)){$child_url = "javascript:void(0);";}
                                                    else{$child_url = $child->url->url;}
                                                @endphp
                                                <li><a href="{!! $child_url !!}">{{strip_tags($child->name)}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @else
                                <li><a href="{!! $url !!}">{!! $menu->name !!}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <span class="copyright">©{{date('Y')}} Talentree. {!! langPart('footer.copyright.text','Tüm Hakları Saklıdır.') !!}</span>
                    <ul class="footerMiniMenu">
                        @foreach($informationPages as $informationPage)
                            <li><a href="{!! $informationPage->detail->url !!}">{!! $informationPage->detail->name !!}</a></li>
                        @endforeach
                        <li><a href="https://www.mediaclick.com.tr" target="_blank">{!! langPart('footer.webdesignw','Web Tasarım') !!}</a> <a href="https://www.mediaclick.com.tr" target="_blank">MediaClick</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
@endsection
