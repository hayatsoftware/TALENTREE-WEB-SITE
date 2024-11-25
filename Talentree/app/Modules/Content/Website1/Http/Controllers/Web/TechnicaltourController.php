<?php

namespace App\Modules\Content\Website1\Http\Controllers\Web;

use Illuminate\Http\Request;
use Mediapress\Http\Controllers\BaseController;
use Mediapress\Foundation\Mediapress;

class TechnicaltourController extends BaseController
{

    public function SitemapDetail(Mediapress $mediapress) {
        $this->sitemapDetailFunc([
        ]);
        $sitemap = $mediapress->sitemap;
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

        return view('web.pages.technicaltour.sitemap', compact('mediapress'));
	}






}
