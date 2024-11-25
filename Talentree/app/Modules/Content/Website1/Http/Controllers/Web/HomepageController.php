<?php

namespace App\Modules\Content\Website1\Http\Controllers\Web;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mediapress\Http\Controllers\BaseController;
use Mediapress\Foundation\Mediapress;
use Illuminate\Support\Facades\Cache;
use Mediapress\Modules\Content\Models\Page;
use Mediapress\Modules\Content\Models\Sitemap;
use Illuminate\Support\Facades\Artisan;
use Mediapress\Modules\Content\Models\Slider;
class HomepageController extends BaseController
{

    public function sitemapDetail(Mediapress $mediapress){

        $slider =  Cache::remember("slider-".$mediapress->activeLanguage->code, 60*60, function () use ($mediapress){
            return Slider::where("name", "ana-sayfa")->with(["scenes", "scenes.detail" => function($q) use ($mediapress){
                $q->where("language_id", $mediapress->activeLanguage->id);
            }])->first();
        });

        $awards = Cache::remember("home-awards-".$mediapress->activeLanguage->code, 60*60, function ()
        use ($mediapress){
            return Page::where("sitemap_id", AWARDS_SITEMAP)->where("status",1)->take(3)->get();
        });

        $IKMessage = Cache::remember("home-about-text" . $mediapress->activeLanguage->code, "1000", function () use
        ($mediapress){
            return Sitemap::where("id", HOME_IK_SITEMAP)->with(["details", "extras"])->first();
        });


        $awaitsyou = Cache::remember("home-awaitsyou-".$mediapress->activeLanguage->code, 60*60, function ()
        use ($mediapress){
            return Page::where("sitemap_id", HOME_AWAITSYOU_SITEMAP)->where("status",1)->get();
        });

        $developmentroad = Cache::remember("home-developmentroad-".$mediapress->activeLanguage->code, 60*60, function ()
        use ($mediapress){
            return Sitemap::where("id", HOME_DEVELOPMENTROAD_SITEMAP)->with(["details", "extras"])->first();
        });


        $informationboxes = Cache::remember("home-informationboxes-".$mediapress->activeLanguage->code, 60*60, function ()
        use ($mediapress){
            return Page::where("sitemap_id", HOME_INFORMATION_BOXES_SITEMAP)->where("status",1)->take(2)->get();
        });

        $interncomments = Cache::remember("home-interncomments-".$mediapress->activeLanguage->code, 60*60,
            function ()
        use ($mediapress){
            return Page::where("sitemap_id", HOME_INTERN_COMMENTS_SITEMAP)->where("status",1)->get();
        });

        $discoverus = Cache::remember("home-discoverus-".$mediapress->activeLanguage->code, 60*60, function ()
        use ($mediapress){
            return Sitemap::where("id", HOME_DISCOVERUS_SITEMAP)->with(["details", "extras"])->first();
        });


        return view("web.pages.homepage.sitemap",compact('slider','awards','IKMessage','awaitsyou','developmentroad','informationboxes','interncomments','discoverus'));

    }



}
