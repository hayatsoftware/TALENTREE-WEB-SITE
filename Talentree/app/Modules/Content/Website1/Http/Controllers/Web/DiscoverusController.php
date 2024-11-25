<?php

namespace App\Modules\Content\Website1\Http\Controllers\Web;

use Illuminate\Http\Request;
use Mediapress\Http\Controllers\BaseController;
use Mediapress\Foundation\Mediapress;
use Mediapress\Modules\Content\Models\Slider;

class DiscoverusController extends BaseController
{

    public function SitemapDetail(Mediapress $mediapress) {

		$this->sitemapDetailFunc([
		]);

        $sitemap = $mediapress->sitemap;

        $slider = Slider::where("name", "bizi-kesfet")->with(["scenes", "scenes.detail" => function($q) use ($mediapress){
            $q->where("language_id", $mediapress->activeLanguage->id);
        }])->first();

        $images = [];
        foreach ($sitemap->f_gallery as $image){
            array_push($images,$image);
        }

        $gallery = array_chunk($images,5);

        return view("web.pages.discoverus.sitemap",compact('mediapress','slider','gallery'));

    }






}
