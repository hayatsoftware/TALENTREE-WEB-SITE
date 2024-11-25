@php
    /** @var \Mediapress\Foundation\Mediapress $mediapress */
    $getDetail = \Mediapress\Modules\Content\Models\Sitemap::where('id',APPLICATIONAPP_SITEMAP)->first();
@endphp
@if(strip_tags($getDetail->detail->text_3)!='')
<div class="headLineBox mtGlobal">
    <div class="container-fluid">
        <div class="fullBoxes bg-blue position-relative color-white text-center">
            <div class="content">
                <span class="date bg-green">{{strip_tags($getDetail->detail->text_1_new)}}</span>
                <h2>{!! $getDetail->detail->detail !!}</h2>
                <a href="{{strip_tags($getDetail->detail->text_3)}}" class="moreBtnAlternative"><small>{!! langPart('site.applynow','Hemen Başvur') !!}</small> <i class="fal fa-arrow-right right"></i></a>
            </div>
            <span class="miniLiner" id="line6"></span>
            <span class="miniLiner" id="line7"></span>
            <span class="miniLiner" id="line8"></span>
            <span class="miniLiner" id="line9"></span>
        </div>
    </div>
</div>
@endif
