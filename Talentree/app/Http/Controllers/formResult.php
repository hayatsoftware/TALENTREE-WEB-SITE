<?php

namespace App\Http\Controllers;

use App\Exports\ApplicationsExport;
use App\Modules\Content\Models\CategoryDetail;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Mediapress\Foundation\Mediapress;
use Mediapress\Modules\Content\Models\Page;

class formResult extends Controller
{
    public function index(Mediapress $mediapress)
    {

        $forms = [];

        $activeAds = Page::where("sitemap_id", APPLICATION_SITEMAP)
            ->whereHas('detail')
            ->with(['detail' => function($q) use($mediapress){
                $q->where("language_id", $mediapress->activeLanguage->id);
            }])
            ->get();


        foreach ($activeAds as $activeAd){
            if($activeAd->categories){
                $catId = $activeAd->categories[0];
                $cateDetail = CategoryDetail::where('category_id',$catId->id)->where('language_id',760)->first();
                if($cateDetail){
                    $catName = $cateDetail->name;
                } else {
                    $catName = ' - ';
                }

            }
            $forms[] = ['page_id'=>$activeAd->id,'name'=>$activeAd->detail->name.' | '.$catName];
        }



        return view('panel.form_result',compact('forms'));
    }

    public function export(Request $request)
    {

        $resultData = [];
        $labelList = [];

        $getMessages = \Mediapress\Modules\Heraldist\Models\Message::where('cint_1',$request->form_id)->get();

        foreach ($getMessages as $message){
            $newRow = [];
            foreach ($message->data as $datRow){
                if($datRow['label']!='application.form.program'){
                    $newRow[] = [$datRow['label']=>$datRow['value']];
                    array_push($labelList,$datRow['label']);
                }
            }
            array_push($labelList,'IP Adresi');
            array_push($labelList,'Başvuru Tarihi');
            array_push($newRow,['IP Adresi'=>$message->ip]);
            array_push($newRow,['Başvuru Tarihi'=>$message->created_at]);
            array_push($resultData,$newRow);
        }

        $labelList = array_unique($labelList);

        return Excel::download(new ApplicationsExport($resultData,$labelList), 'applications.xlsx');
    }
}
