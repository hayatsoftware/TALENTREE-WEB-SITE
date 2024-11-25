<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Mediapress\Modules\Locale\Models\County;
use Mediapress\Modules\Locale\Models\Province;

class CountiesController extends Controller
{

    public function show(Request $request)
    {
        $province = Province::where('name', $request->province_name)->first();
        if($province){
            return County::where('province_id', $province->id)->pluck('name')->toArray();
        }

    }

    public function getBranchs(Request $request)
    {
        if($request->branch_id>0 and ($request->lang=='tr' or $request->lang=='en')){


            $univercity_branchs = json_decode(file_get_contents('../public/assets/json/univercity_branch_'.$request->lang.'.json'), true);

            $filteredData = array_filter($univercity_branchs, function ($item) use ($request) {
                return $item['univercity_id'] == $request->branch_id;
            });

            if($filteredData){
                $namesOnly = array_column($filteredData, 'name');
                sort($namesOnly);

                return $namesOnly;
            }

        }


    }

}
