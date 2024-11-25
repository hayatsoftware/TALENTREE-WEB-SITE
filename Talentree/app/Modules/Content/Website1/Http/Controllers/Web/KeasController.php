<?php

namespace App\Modules\Content\Website1\Http\Controllers\Web;

use Illuminate\Http\Request;
use Mediapress\Http\Controllers\BaseController;
use Mediapress\Foundation\Mediapress;
use Mediapress\Modules\Content\Models\Page;

class KeasController extends BaseController
{

    public function SitemapDetail(Mediapress $mediapress) {

		$this->sitemapDetailFunc([
		]);

        $principles = Page::where("sitemap_id", PRINCIPLES_SITEMAP)
            ->where("status", 1)
            ->whereHas('detail')
            ->with(['detail' => function($q) use($mediapress){
                $q->where("language_id", $mediapress->activeLanguage->id);
            }])
            ->orderBy("order")
            ->get();

        return view('web.pages.keas.sitemap', compact('mediapress','principles'));

    }






}
