<?php

namespace App\Modules\Content\Website1\Http\Controllers\Web;

use App\Modules\Content\Models\Category;
use App\Modules\Content\Models\CategoryPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Mediapress\FileManager\Models\MFileGeneral;
use Mediapress\Http\Controllers\BaseController;
use Mediapress\Foundation\Mediapress;
use Mediapress\Modules\Content\Models\Page;
use Mediapress\Modules\Content\Models\Property;
use Mediapress\Modules\Locale\Models\Province;

class ApplicationsController extends BaseController
{

    public function SitemapDetail(Mediapress $mediapress) {

        $sitemap = $mediapress->sitemap;
        $mediapress->data["breadcrumb"] = [
            0 => [
                'url'=> '/'.$mediapress->activeLanguage->code,
                'name'=> langPart('breadcrumb.home','Ana Sayfa')
            ],
            1 => [
                'url'=> 'javascript:void();',
                'name'=> langPart("header.application.button.text","Başvur")
            ],
            2 => [
                'url'=> 'javascript:void();',
                'name'=> $sitemap->detail->name
            ]
        ];
		$this->sitemapDetailFunc([
            "pages" => [
                "select" => ["id", "status", "detail.id", "detail.page_id", "detail.name", "detail.detail", "url.url", "url.model_id", "url.model_type"],
                "image" => ["cover"],
                "paginate" => 12,
                "order" => [
                    "by" => "order",
                    "direction" => "asc"
                ]
            ],
            "categories" => [
                "select" => ["id", "category_id", "status", "detail.id", "detail.category_id", "detail.name", "detail.detail", "url.url", "url.model_id", "url.model_type"],
                "image" => ["cover"],
            ],
		]);


        $categories = Category::where('sitemap_id',$sitemap->id)
            ->whereHas('detail')
            ->where('status',1)
            ->with(['detail' => function($q) use($mediapress){
                $q->where("language_id", $mediapress->activeLanguage->id);
            },'extras','details' => function($q) use($mediapress){
                $q->where("language_id", $mediapress->activeLanguage->id);
            }])->orderBy('lft')->get();


        for($i = 0; $i < count($categories); ++$i) {
            $cover = MFileGeneral::selectRaw('mfile_general.mfile_id as f_cover')
                ->leftJoin('mfiles', 'mfiles.id', '=', 'mfile_general.mfile_id')
                ->where('mfile_general.model_type','Mediapress\Modules\Content\Models\Category')
                ->where('mfile_general.file_key','cover')
                ->where('mfile_general.model_id',$categories[$i]->id)
                ->first();
            if($cover){
                $categories[$i]['f_cover'] = $cover->f_cover;
            } else {
                $categories[$i]['f_cover'] = 0;
            }
            $flogo = MFileGeneral::selectRaw('mfile_general.mfile_id as f_logo')
                ->leftJoin('mfiles', 'mfiles.id', '=', 'mfile_general.mfile_id')
                ->where('mfile_general.model_type','Mediapress\Modules\Content\Models\Category')
                ->where('mfile_general.file_key','logo')
                ->where('mfile_general.model_id',$categories[$i]->id)
                ->first();
            if($flogo){
                $categories[$i]['f_logo'] = $flogo->f_logo;
            } else {
                $categories[$i]['f_logo'] = 0;
            }

            $page = CategoryPage::where('category_id',$categories[$i]->id)->orderBy('page_id','DESC')->first();
            if($page){
                $pageDetails = Page::
                    where("id", $page->page_id)
                    ->where("status", 1)
                    ->whereHas('detail')
                    ->with(['detail' => function($q) use($mediapress){
                        $q->where("language_id", 760);
                    }])
                    ->first();
                if($pageDetails){
                    $categories[$i]['category_page'] = $page->page_id;
                } else {
                    $categories[$i]['category_page'] = 0;
                }
            } else {
                $categories[$i]['category_page'] = 0;
            }


        }
        return view('web.pages.applications.sitemap', compact('mediapress','categories'));
	}

    public function PageDetail(Mediapress $mediapress) {

		return $this->pageDetailFunc([
            "page" => [
                "select" => ["*"],
                "image" => ["cover"],
            ],
            "category" => [
                "select" => ["id", "category_id", "status", "detail.id", "detail.category_id", "detail.name", "detail.detail", "url.url", "url.model_id", "url.model_type"],
                "image" => ["cover"],
            ],
		]);
	}

    public function CategoryDetail(Mediapress $mediapress,Request $request) {

        $sitemapUrl = $mediapress->sitemap->detail->url->url;

        $provinces = Province::where('country_id', 223)->pluck('name', 'id')->toArray();




        $this->categoryDetailFunc([
            "children" => [
                "select" => ["id", "category_id", "status", "detail.id", "detail.category_id", "detail.name", "detail.detail", "url.url", "url.model_id", "url.model_type"],
                "image" => ["cover"],
            ],
            "category" => [
                "select" => ["id", "category_id", "status", "detail.id", "detail.category_id", "detail.name", "detail.detail", "url.url", "url.model_id", "url.model_type"],
                "image" => ["cover"],
            ],
            "pages" => [
                "select" => ["id", "status", "detail.id", "detail.page_id", "detail.name", "detail.detail", "url.url", "url.model_id", "url.model_type"],
                "image" => ["cover"],
                "paginate" => 12,
                "order" => [
                    "by" => "order",
                    "direction" => "asc"
                ]
            ],
        ]);

        if($request->step!='success') {
            if (session('formStarted') != 1) {
                return redirect($sitemapUrl);
            }
        }

        if($request->step){
            $step = $request->step;

            if($step==2){
                $univercities = json_decode(file_get_contents('../public/assets/json/univercity_'.$mediapress->activeLanguage()->code.'.json'), true);

                return view('web.pages.applications.category_step_2', compact('mediapress','univercities'));
            } elseif ($step==3){
                $LocationList = array();
                $Locations = Property::where('sitemap_id',15)->where('property_id',1)
                    ->whereHas('detail')
                    ->with(['detail' => function($q) use($mediapress){
                        $q->where("language_id", $mediapress->activeLanguage->id);
                    }])->get();

                foreach ($Locations as $location){
                    array_push($LocationList,$location->detail->name);
                }

                $DepertmanList = array();
                $Depertmans = Property::where('sitemap_id',15)->where('property_id',9)
                    ->whereHas('detail')
                    ->with(['detail' => function($q) use($mediapress){
                        $q->where("language_id", $mediapress->activeLanguage->id);
                    }])->get();

                foreach ($Depertmans as $Depertman){
                    array_push($DepertmanList,$Depertman->detail->name);
                    session([slug($Depertman->detail->name)=>$Depertman->detail->name]);
                }

                sort($DepertmanList);
                sort($LocationList);

                return view('web.pages.applications.category_step_3', compact('mediapress','LocationList','DepertmanList'));
            } elseif($step=='success') {
                return view('web.pages.applications.success_application', compact('mediapress'));
            } else {
                return redirect($sitemapUrl);
            }

        } else {
            if(session('pageId')){


                $page = Page::whereHas('detail')
                    ->with(['detail' => function($q) use($mediapress){
                        $q->where("language_id", $mediapress->activeLanguage->id);
                    },'extras'])
                    ->leftJoin('category_page', 'category_page.page_id', '=', 'pages.id')
                    ->where('pages.status',1)
                    ->whereNull('pages.deleted_at')
                    ->where('id',session('pageId'))
                    ->first();

                return view('web.pages.applications.category', compact('mediapress','page','provinces'));
            } else {
                return redirect($sitemapUrl);
            }
        }


	}


}
