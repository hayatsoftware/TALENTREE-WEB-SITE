<?php

namespace App\Modules\Content\Website1\Http\Controllers\Web;

use Illuminate\Http\Request;
use Mediapress\Http\Controllers\BaseController;
use Mediapress\Foundation\Mediapress;
use Mediapress\Modules\Content\Models\Page;

class InternshipprogramController extends BaseController
{

    public function SitemapDetail(Mediapress $mediapress) {

        $this->sitemapDetailFunc([
        ]);

        $sitemap = $mediapress->sitemap;

        $videos = Page::where("sitemap_id", INTERNVIDEO_SITEMAP)
            ->where("status", 1)
            ->whereHas('detail')
            ->with(['detail' => function($q) use($mediapress){
                $q->where("language_id", $mediapress->activeLanguage->id);
            }])
            ->orderBy("order")
            ->get();


        $mediapress->data["breadcrumb"] = [
            0 => [
                'url'=> '/'.$mediapress->activeLanguage->code,
                'name'=> langPart('breadcrumb.home','Ana Sayfa')
            ],
            1 => [
                'url'=> 'javascript:void();',
                'name'=> langPart('breadcrumb.youngtalentprograms','Genç Yetenek Programları')
            ],
            2 => [
                'url'=> 'javascript:void();',
                'name'=> $sitemap->detail->name
            ]
        ];

        return view('web.pages.internshipprogram.sitemap', compact('mediapress','videos'));
	}






}
