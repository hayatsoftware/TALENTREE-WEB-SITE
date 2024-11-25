<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Mediapress\Foundation\Mediapress;
use Mediapress\Modules\Content\Models\Page;
use Mediapress\Modules\Heraldist\Models\Message;

class ApplicationController extends Controller
{

    public function startApplicationForm(Request $request)
    {
        Session::flush();
        if ($request->server('HTTP_CF_CONNECTING_IP')) {
            $ipAddress = $request->server('HTTP_CF_CONNECTING_IP');
        } else {
            $ipAddress = $request->server('REMOTE_ADDR');
        }

        if($request->id){
            session(['formStarted' => '1','ipAddress'=>$ipAddress,'pageId'=>$request->id,'category'=>$request->category,'startDate'=>Carbon::now()]);
        } else {
            return response()->json(['status' => 'false'], 422);
        }

        return response()->json(['status' => 'success'], 200);



    }

    public function checkUser(Request $request)
    {
        $email = $request->email;
        $phone = $request->phone;
        if($email && $phone){
            $checkUser = \DB::table('messages')->where('cint_1',session('pageId'))
                ->where(function ($query) use ($email,$phone) {
                    $query->where('email', $email)
                        ->orWhere('phone', $phone);
                })->count();
            if($checkUser==0){
                return response()->json(['status' => 'true'], 200);
            } else {
                return response()->json(['status' => 'false'], 400);
            }
        }


        return response()->json(['status' => 'false'], 422);

    }

    public function applicationSteps(Mediapress $mediapress,Request $request){

        if(session('formStarted')==1){

            if($request->step==1){



                $email = $request->application_form_email;
                $phone = $request->application_form_phone;


                $checkUser = \DB::table('messages')->where('cint_1',session('pageId'))
                    ->where(function ($query) use ($email,$phone) {
                        $query->where('email', $email)
                            ->orWhere('phone', $phone);
                    })->count();

                foreach ($request->all() as $requestKey=>$requestVal){
                    if($requestKey!='_token'){
                        session([$requestKey=>$requestVal]);
                    }

                }
                if($checkUser==0){
                    return redirect($request->formUrl.'?step=2');
                } else {
                    return Redirect::back()->withErrors(['msg' => langPart('form_start_error','Hata! Aynı E-mail ve Telefon numarası ile birden fazla başvuru oluşturamazsınız!')]);

                }
            } else if($request->step==2){
                foreach ($request->all() as $requestKey=>$requestVal){
                    if($requestKey!='_token'){
                        session([$requestKey=>$requestVal]);
                    }

                }
                return redirect($request->formUrl.'?step=3');
            } else if($request->step==3){
                $depertmans = '';
                foreach ($request->all() as $requestKey=>$requestVal){
                    if($requestKey!='_token'){
                        if(strpos($requestKey, 'departmentInput')!==false){
                            $keyDepKey = explode('departmentInput_',$requestKey);
                            if($keyDepKey){
                                if($keyDepKey[1]){
                                    $getVal = session($keyDepKey[1]);
                                    if($getVal){
                                        $depertmans.=$getVal.',';
                                    }
                                }
                            }
                        } else {

                            session([$requestKey=>$requestVal]);
                        }
                    }

                }

                if($depertmans!=''){
                    $request->request->add(['application_form_internquest6' => $depertmans]);
                    session(['application_form_internquest6'=>$depertmans]);
                }



                $formResult = [];

                $formElementStandart = [
                    'application_form_program',
                    'application_form_namesurname',
                    'application_form_gender',
                    'application_form_phone',
                    'application_form_email',
                    'application_form_distinct',
                    'application_form_province',
                    'application_form_placeofbirth',
                    'application_form_birthday',
                    'application_form_educationlevel',
                    'application_form_university',
                    'application_form_departmant',
                    'application_form_transcript_point',
                    'application_form_transcriptscale',
                    'application_form_university_class',
                    'application_form_datestart',
                    'application_form_dateend',
                    'application_form_university2st',
                    'application_form_university2',
                    'application_form_departmant2',
                    'application_form_transcript_point2',
                    'application_form_transcriptscale2',
                    'application_form_university_class_title2',
                    'application_form_datestart2',
                    'application_form_dateend2',
                    'application_form_englishlevel'
                ];


                if(session('category')=='5'){
                    //staj programı
                    $formElementStep3 = [
                        'application_form_interntype',
                        'application_form_internquest',
                        'application_form_internquest2',
                        'application_form_internquest3',
                        'application_form_internquest4',
                        'application_form_internquest5',
                        'application_form_internquest7',
                        'application_form_internquest6'
                    ];
                } else if(session('category')=='6'){
                    // ideathon
                    $formElementStep3 = [
                        'application_form_internquest',
                        'application_form_internquest2',
                        'application_form_internquest3',
                        'application_form_internquest4',
                        'application_form_howteam',
                        'application_form_ideathon_quest',
                        'application_form_ideathon_quest2',
                    ];
                } else {
                    // teknik geziler
                    $formElementStep3 = [
                        'application_form_internquest',
                        'application_form_internquest2',
                        'application_form_internquest3',
                        'application_form_ideathon_quest3',
                        'application_form_ideathon_quest4',
                    ];

                }



                $formElementStandart = array_merge($formElementStandart,$formElementStep3);

                foreach ($formElementStandart as $formElement){
                    $sessValue = session($formElement);
                    $keyFix = str_replace('_','.',$formElement);
                    $checkValue = langPart($keyFix,null,array(),760);
                    if($checkValue){

                        $prefix = '';
                        if (array_key_exists($checkValue, $formResult)) {
                            $prefix = '2.';
                        }
                        if($checkValue=='Skala' || $checkValue=='Scale'){
                            if($sessValue=='skala-100'){
                                $sessValue = '100\'lü Skala';
                            } else if($sessValue=='skala-4'){
                                $sessValue = '4\'lü Skala';
                            }
                        }
                        $resultRow = [$prefix.$checkValue=>$sessValue];
                        $formResult = $formResult + $resultRow;
                    }
                }


                if(session('category')=='6'){
                    $teamFriendList = '';
                    $teamFriends = session('application_form_please_team_friend_name');
                    $teamFriendsSurname = session('application_form_please_team_friend_surname');
                    if(session('application_form_please_team_friend_name')){
                        for($i = 0; $i < count($teamFriends); ++$i) {
                            $teamFriendList.=$teamFriends[$i].' '.$teamFriendsSurname[$i].',';
                        }
                    }

                    if($teamFriendList!=''){
                        $resultRow = ['Takım Arkadaşları'=>$teamFriendList];
                        $formResult = $formResult + $resultRow;
                    }
                }




                $activeAds = Page::where("sitemap_id", APPLICATION_SITEMAP)
                    ->where("id", session('pageId'))
                    ->whereHas('detail')
                    ->with(['detail' => function($q) use($mediapress){
                        $q->where("language_id", $mediapress->activeLanguage->id);
                    }])
                    ->first();

                if($activeAds){
                    $jsonElements = [];
                    foreach ($formResult as $formkey=>$formitem){
                        $jsonElements[md5($formkey)] = [
                            "label" => $formkey,
                            "key" => md5($formkey),
                            "attr_type" => "text",
                            "type"=> "input",
                            "value"=>$formitem
                        ];
                    }


                    $message = new Message();
                    $message->data = ' ';
                    $message->email = session('application_form_email');
                    $message->phone = session('application_form_phone');
                    $message->form_id = 1;
                    $message->name = 'Başvuru Formu';
                    $message->subject = session('application_form_program').' Başvurusu | '.$activeAds->detail->name;
                    $message->agent = userAgentForm();
                    $message->track_id = null;
                    $message->visit_id = 0;
                    $message->source = null;
                    $message->utm = null;
                    $message->ip = session('ipAddress');
                    $message->created_at = session('startDate');
                    $message->cint_1 = session('pageId');
                    $message->cint_2 = session('category');
                    $message->save();

                    DB::table('messages')->where('id',$message->id)->update(['data'=>json_encode($jsonElements,JSON_UNESCAPED_UNICODE)]);

                    if($message){
                        Session::flush();
                        return redirect($request->formUrl.'?step=success');
                    }

                } else {
                    return view('errors.noform', compact('mediapress'));
                }
            }

        } else {
            return view('errors.noform', compact('mediapress'));
        }
    }



}
