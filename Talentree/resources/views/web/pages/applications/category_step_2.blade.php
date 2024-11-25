@extends('web.inc.app')
@push('styles')
    <link rel="stylesheet" href="{!! asset("assets/css/form.css?v=").time() !!}">
    <link rel="stylesheet" href="{!! asset("assets/css/page.css?v=").time() !!}">
    <link rel="stylesheet" href="{!! asset("assets/css/bootstrap-datepicker.min.css") !!}">
    <link rel="stylesheet" href="{!! asset("assets/css/applyPage.css?v=").time() !!}">


@endpush
@php
    /** @var \Mediapress\Foundation\Mediapress $mediapress */
    $category = $mediapress->data['category'];
@endphp
@section('content')
    <main class="main" id="main">
        <section class="section">
            <svg class="svgBox first" width="191" height="136" viewBox="0 0 191 136" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M0 1L190 135" stroke="#5FB157" stroke-width="2" class="svg-elem-1"></path>
            </svg>
            <svg class="svgBox two" width="192" height="137" viewBox="0 0 192 137" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M0 1L191 136" stroke="#5FB157" stroke-width="2" class="svg-elem-2"></path>
            </svg>
            <svg class="svgBox three" width="172" height="122" viewBox="0 0 172 122" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M1 1L171 121" stroke="#5FB157" stroke-width="2" class="svg-elem-3"></path>
            </svg>
            <svg class="svgBox four" width="91" height="67" viewBox="0 0 91 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M1 1L93 66" stroke="#5FB157" stroke-width="2" class="svg-elem-4"></path>
            </svg>
            <div class="container-fluid">
                <div class="pageTitle text-center">
                    <div class="backBtn">
                        <a href="javascript:history.back()"><span><i class="fal fa-long-arrow-left"></i> {!! langPart('backhomepage','Geri Dön') !!}</span></a>
                    </div>
                    <h1>{{$category->detail->name}}</h1>
                </div>
                <div class="pageContent">
                    <div class="mw-80">
                        <div class="stepList mb-5">
                            <ol>
                                <li><a href="javascript:void(0);">{!! langPart('application.form.step_1','Kişisel Bilgiler') !!}</a></li>
                                <li class="active"><a href="javascript:void(0);">{!! langPart('application.form.step_2','Eğitim Bilgileri') !!}</a></li>
                                <li><a href="javascript:void(0);">{!! langPart('application.form.step_3','Diğer Bilgiler') !!}</a></li>
                            </ol>
                        </div>
                        <div class="formPage">
                            <form class="row g-3 needs-validation" method="POST" action="{{url('/applications/step/2')}}" autocomplete="off" novalidate>
                                @csrf
                                <input type="hidden" name="formUrl" value="{{url($category->detail->url)}}">
                                <div class="col-md-6">
                                    <div class="form-group noSearchList">
                                        <select name="application.form.educationlevel" class="form-select form-control chosenSelect" id="educationLevel" aria-label="{!! langPart('application.form.educationlevel','Eğitim Seviyesi') !!}" required>
                                            <option selected disabled value="">{!! langPart('application.form.educationlevel','Eğitim Seviyesi') !!}</option>
                                            <option @if(session('application_form_educationlevel')==langPart('application.form.educationlevel.option1','Lisans Öğrenci')) selected="selected" @endif value="{!! langPart('application.form.educationlevel.option1','Lisans Öğrenci') !!}">{!! langPart('application.form.educationlevel.option1','Lisans Öğrenci') !!}</option>
                                            <option @if(session('application_form_educationlevel')==langPart('application.form.educationlevel.option2','Lisans Mezun')) selected="selected" @endif value="{!! langPart('application.form.educationlevel.option2','Lisans Mezun') !!}">{!! langPart('application.form.educationlevel.option2','Lisans Mezun') !!}</option>
                                            <option @if(session('application_form_educationlevel')==langPart('application.form.educationlevel.option3','Ön Lisans Öğrenci')) selected="selected" @endif value="{!! langPart('application.form.educationlevel.option3','Ön Lisans Öğrenci') !!}">{!! langPart('application.form.educationlevel.option3','Ön Lisans Öğrenci') !!}</option>
                                            <option @if(session('application_form_educationlevel')==langPart('application.form.educationlevel.option4','Ön Lisans Mezun')) selected="selected" @endif value="{!! langPart('application.form.educationlevel.option4','Ön Lisans Mezun') !!}">{!! langPart('application.form.educationlevel.option4','Ön Lisans Mezun') !!}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.educationlevel.error','Lütfen Eğitim Seviyesi Seçiniz.') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <select name="application.form.university" class="form-select form-control chosenSelect" id="universitySelect" aria-label="{!! langPart('application.form.university','Üniversite') !!}" required>
                                            <option selected disabled value="">{!! langPart('application.form.university','Üniversite') !!}</option>
                                            <option data-id="-1" value="-1">{!! langPart('application.form.other.option','Diğer') !!}</option>
                                            @foreach($univercities as $uni=>$unidat)
                                                <option @if(session('application_form_university')==$unidat) selected="selected"  @endif data-id="{{$uni+1}}" value="{{$unidat}}">{{$unidat}}</option>
                                            @endforeach
                                        </select>

                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.university.error','Lütfen Üniversite Giriniz.') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-none" id="universityManualAll">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="text" name="application.form.university" id="universityManual" class="form-control d-none" placeholder="{!! langPart('application.form.university','Üniversite') !!}" value="{{session('application_form_university')}}" disabled="disabled"  required>
                                            <div class="invalid-feedback">
                                                {!! langPart('application.form.university.error','Lütfen Üniversite Giriniz.') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <select name="application.form.departmant" class="form-select form-control chosenSelect" id="universityBranchSelect" aria-label="{!! langPart('application.form.university.departmant','Bölüm') !!}" required>
                                            <option selected disabled value="">{!! langPart('application.form.university.departmant','Bölüm') !!}</option>
                                            @if(session('application_form_departmant'))
                                                <option selected="selected" value="{{session('application_form_departmant')}}">{{session('application_form_departmant')}}</option>
                                            @endif
                                        </select>
                                        <input type="text" name="application.form.departmant" id="universityBranchManual" class="form-control d-none" placeholder="{!! langPart('application.form.university.departmant','Bölüm') !!}" value="{{session('application_form_departmant')}}" disabled="disabled"  required>

                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.university.departmant.error','Lütfen Bölüm Giriniz.') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="multiSelectList">
                                        <div class="cols_1">
                                            <div class="form-group noSearchList">
                                                <select name="application.form.transcript.point" class="form-select form-control chosenSelect" id="transkriptFirstSelect" aria-label="{!! langPart('application.form.transcript.point','Transkript Notunuz Nedir?') !!}" required>
                                                    <option selected disabled value="">{!! langPart('application.form.transcript.point','Transkript Notunuz Nedir?') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select01','0.0-2.0')) selected="selected" @endif value="{!! langPart('application.form.transcript.select01','0.0-2.0') !!}">{!! langPart('application.form.transcript.select01','0.0-2.0') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select02','2.1-2.5')) selected="selected" @endif value="{!! langPart('application.form.transcript.select02','2.1-2.5') !!}">{!! langPart('application.form.transcript.select02','2.1-2.5') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select03','2.6-3.0')) selected="selected" @endif value="{!! langPart('application.form.transcript.select03','2.6-3.0') !!}">{!! langPart('application.form.transcript.select03','2.6-3.0') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select04','3.1-3.5')) selected="selected" @endif value="{!! langPart('application.form.transcript.select04','3.1-3.5') !!}">{!! langPart('application.form.transcript.select04','3.1-3.5') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select05','3.6-3.8')) selected="selected" @endif value="{!! langPart('application.form.transcript.select05','3.6-3.8') !!}">{!! langPart('application.form.transcript.select05','3.6-3.8') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select06','3.9-4.0')) selected="selected" @endif value="{!! langPart('application.form.transcript.select06','3.9-4.0') !!}">{!! langPart('application.form.transcript.select06','3.9-4.0') !!}</option>
                                                </select>
                                                <select name="application.form.transcript.point" class="form-select form-control chosenSelect" id="transkriptLastSelect" aria-label="{!! langPart('application.form.transcript.point','Transkript Notunuz Nedir?') !!}">
                                                    <option selected disabled value="">{!! langPart('application.form.transcript.point','Transkript Notunuz Nedir?') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select07','97-100')) selected="selected" @endif value="{!! langPart('application.form.transcript.select07','97-100') !!}">{!! langPart('application.form.transcript.select07','97-100') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select08','93-96')) selected="selected" @endif value="{!! langPart('application.form.transcript.select08','93-96') !!}">{!! langPart('application.form.transcript.select08','93-96') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select09','90-92')) selected="selected" @endif value="{!! langPart('application.form.transcript.select09','90-92') !!}">{!! langPart('application.form.transcript.select09','90-92') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select010','87-89')) selected="selected" @endif value="{!! langPart('application.form.transcript.select010','87-89') !!}">{!! langPart('application.form.transcript.select010','87-89') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select011','83-86')) selected="selected" @endif value="{!! langPart('application.form.transcript.select011','83-86') !!}">{!! langPart('application.form.transcript.select011','83-86') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select012','80-82')) selected="selected" @endif value="{!! langPart('application.form.transcript.select012','80-82') !!}">{!! langPart('application.form.transcript.select012','80-82') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select013','77-79')) selected="selected" @endif value="{!! langPart('application.form.transcript.select013','77-79') !!}">{!! langPart('application.form.transcript.select013','77-79') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select014','73-76')) selected="selected" @endif value="{!! langPart('application.form.transcript.select014','73-76') !!}">{!! langPart('application.form.transcript.select014','73-76') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select015','70-72')) selected="selected" @endif value="{!! langPart('application.form.transcript.select015','70-72') !!}">{!! langPart('application.form.transcript.select015','70-72') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select016','67-69')) selected="selected" @endif value="{!! langPart('application.form.transcript.select016','67-69') !!}">{!! langPart('application.form.transcript.select016','67-69') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.select017','65-66')) selected="selected" @endif value="{!! langPart('application.form.transcript.select017','65-66') !!}">{!! langPart('application.form.transcript.select017','65-66') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.point.option','65\'in altında')) selected="selected" @endif value="{!! langPart('application.form.transcript.point.option','65\'in altında') !!}">{!! langPart('application.form.transcript.point.option','65\'in altında') !!}</option>
                                                </select>

                                                <select name="application.form.transcript.point" class="form-select form-control chosenSelect" id="transkriptNewLastSelect" aria-label="{!! langPart('application.form.transcript.point','Transkript Notunuz Nedir?') !!}" required>
                                                    <option selected disabled value="">{!! langPart('application.form.transcript.point','Transkript Notunuz Nedir?') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.ects1','A (9 - 10)')) selected="selected" @endif value="{!! langPart('application.form.transcript.ects1','A (9 - 10)') !!}">{!! langPart('application.form.transcript.ects1','A (9 - 10)') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.ects2','B (8 - 9)')) selected="selected" @endif value="{!! langPart('application.form.transcript.ects2','B (8 - 9)') !!}">{!! langPart('application.form.transcript.ects2','B (8 - 9)') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.ects3','C (7-8)')) selected="selected" @endif value="{!! langPart('application.form.transcript.ects3','C (7-8)') !!}">{!! langPart('application.form.transcript.ects3','C (7-8)') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.ects4','D (6 - 7)')) selected="selected" @endif value="{!! langPart('application.form.transcript.ects4','D (6 - 7)') !!}">{!! langPart('application.form.transcript.ects4','D (6 - 7)') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.ects5','E (6)')) selected="selected" @endif value="{!! langPart('application.form.transcript.ects5','E (6)') !!}">{!! langPart('application.form.transcript.ects5','E (6)') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.ects6','FX (5)')) selected="selected" @endif value="{!! langPart('application.form.transcript.ects6','FX (5)') !!}">{!! langPart('application.form.transcript.ects6','FX (5)') !!}</option>
                                                    <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.ects7','F (1 - 4)')) selected="selected" @endif value="{!! langPart('application.form.transcript.ects7','F (1 - 4)') !!}">{!! langPart('application.form.transcript.ects7','F (1 - 4)') !!}</option>
                                                </select>

                                                <div class="invalid-feedback">
                                                    {!! langPart('application.form.transcript.error','Lütfen Transkript Notunuzu Seçiniz.') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols_2">
                                            <div class="form-group noSearchList">
                                                <select name="application.form.transcriptscale" class="form-select form-control chosenSelect" id="skala" aria-label="{!! langPart('application.form.transcriptscale','Skala') !!}" required>
                                                    <option  disabled value="">{!! langPart('application.form.transcriptscale','Skala') !!}</option>
                                                    <option @if(session('application_form_transcriptscale')=='skala-4') selected="selected" @endif value="skala-4" selected>{!! langPart('application.form.transcriptscale.option1','4\'lü Skala') !!}</option>
                                                    <option @if(session('application_form_transcriptscale')=='skala-100') selected="selected" @endif value="skala-100">{!! langPart('application.form.transcriptscale.option2','100\'lü Skala') !!}</option>
                                                    <option @if(session('application_form_transcriptscale')=='ects') selected="selected" @endif value="ects">{!! langPart('application.form.transcriptscale.option3','ECTS') !!}</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    {!! langPart('application.form.transcriptscale.error','Lütfen Skala Bilgisi Seçiniz.') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group noSearchList">
                                        <select name="application.form.university.class" class="form-select form-control chosenSelect" id="whichGrade" aria-label="{!! langPart('application.form.university.class','Kaçıncı Sınıftasın?') !!}" required>
                                            <option selected disabled value="">{!! langPart('application.form.university.class','Kaçıncı Sınıftasın?') !!}</option>
                                            <option @if(session('application_form_university_class')==langPart('application.form.university.preparation','Hazırlık')) selected="selected" @endif  value="{!! langPart('application.form.university.preparation','Hazırlık') !!}">{!! langPart('application.form.university.preparation','Hazırlık') !!}</option>
                                            <option @if(session('application_form_university_class')=='1.'.langPart('application.form.university.class.text','Sınıf')) selected="selected" @endif value="1.{!! langPart('application.form.university.class.text','Sınıf') !!}">1.{!! langPart('application.form.university.class.text','Sınıf') !!}</option>
                                            <option @if(session('application_form_university_class')=='2.'.langPart('application.form.university.class.text','Sınıf')) selected="selected" @endif value="2.{!! langPart('application.form.university.class.text','Sınıf') !!}">2.{!! langPart('application.form.university.class.text','Sınıf') !!}</option>
                                            <option @if(session('application_form_university_class')=='3.'.langPart('application.form.university.class.text','Sınıf')) selected="selected" @endif value="3.{!! langPart('application.form.university.class.text','Sınıf') !!}">3.{!! langPart('application.form.university.class.text','Sınıf') !!}</option>
                                            <option @if(session('application_form_university_class')=='4.'.langPart('application.form.university.class.text','Sınıf')) selected="selected" @endif value="4.{!! langPart('application.form.university.class.text','Sınıf') !!}">4.{!! langPart('application.form.university.class.text','Sınıf') !!}</option>
                                            <option @if(session('application_form_university_class')==langPart('application.form.university.newgraduated','Yeni Mezun')) selected="selected" @endif value="{!! langPart('application.form.university.newgraduated','Yeni Mezun') !!}">{!! langPart('application.form.university.newgraduated','Yeni Mezun') !!}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.university.class.error','Lütfen Kaçıncı Sınıftasın? Seçiniz.') !!}

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group datepickerActive">
                                        <input type="text" name="application.form.datestart" class="form-control datepicker" placeholder="{!! langPart('application.form.datestart','Üniversite Başlama Tarihi') !!}" value="{{session('application_form_datestart')}}" id="date1" required>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.date.error','Lütfen Tarih Seçiniz.') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group datepickerActive">
                                        <input name="application.form.dateend" type="text" class="form-control datepicker" placeholder="{!! langPart('application.form.dateend','Üniversite Bitiş Tarihi') !!}" value="{{session('application_form_dateend')}}" id="date2" required>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.date.error','Lütfen Tarih Seçiniz.') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group noSearchList">
                                        <select name="application.form.university2st" class="form-select form-control chosenSelect" id="questionSchool" aria-label="{!! langPart('application.form.university2st','İkinci Üniversitede Okuyor musun?') !!}" required>
                                            <option selected disabled value="">{!! langPart('application.form.university2st','İkinci Üniversitede Okuyor musun?') !!}</option>
                                            <option @if(session('application_form_university2st')==langPart('application.form.yes','Evet')) selected="selected" @endif value="{!! langPart('application.form.yes','Evet') !!}">{!! langPart('application.form.yes','Evet') !!}</option>
                                            <option @if(session('application_form_university2st')==langPart('application.form.no','Hayır')) selected="selected" @endif value="{!! langPart('application.form.no','Hayır') !!}">{!! langPart('application.form.no','Hayır') !!}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.please.select','Lütfen Seçiniz.') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 otherForm hidden">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="fTitle text-center">
                                                {!! langPart('application.form.university2st.title','İkinci Üniversite Bilgileri') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select name="application.form.university2" class="form-select form-control chosenSelect" id="universitySelect2" aria-label="{!! langPart('application.form.university2','Üniversite') !!}" required>
                                                    <option selected disabled value="">{!! langPart('application.form.university2','Üniversite') !!}</option>
                                                    <option data-id="-1" value="-1">{!! langPart('application.form.other.option','Diğer') !!}</option>
                                                    @foreach($univercities as $uni=>$unidat)
                                                        <option @if(session('application_form_university2')==$unidat) selected="selected" @endif data-id="{{$uni+1}}" value="{{$unidat}}">{{$unidat}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    {!! langPart('application.form.university.error','Lütfen Üniversite Giriniz.') !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 d-none" id="universityManual2All">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input type="text" name="application.form.university2" id="universityManual2" class="form-control d-none" placeholder="{!! langPart('application.form.university2','Üniversite') !!}" value="{{session('application_form_university2')}}" disabled="disabled"  required>
                                                    <div class="invalid-feedback">
                                                        {!! langPart('application.form.university.error','Lütfen Üniversite Giriniz.') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <select name="application.form.departmant2" class="form-select form-control chosenSelect" id="universityBranchSelect2" aria-label="{!! langPart('application.form.university.departmant2','Bölüm') !!}" required>
                                                    <option selected disabled value="">{!! langPart('application.form.university.departmant2','Bölüm') !!}</option>
                                                    @if(session('application_form_departmant2'))
                                                        <option selected="selected" value="{{session('application_form_departmant2')}}">{{session('application_form_departmant2')}}</option>
                                                    @endif
                                                </select>
                                                <input type="text" name="application.form.departmant2" id="universityBranchManual2" class="form-control d-none" placeholder="{!! langPart('application.form.university.departmant2','Bölüm') !!}" value="{{session('application_form_departmant2')}}" disabled="disabled"  required>

                                                <div class="invalid-feedback">
                                                    {!! langPart('application.form.university.departmant.error','Lütfen Bölüm Giriniz.') !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="multiSelectList">
                                                <div class="cols_1">
                                                    <div class="form-group noSearchList">
                                                        <select name="application.form.transcript.point2" class="form-select chosenSelect" id="transkriptFirstSelect1" aria-label="{!! langPart('application.form.transcript.point2','Transkript Notunuz Nedir?') !!}">
                                                            <option selected disabled value="">{!! langPart('application.form.transcript.point','Transkript Notunuz Nedir?') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select1','0.0-2.0')) selected="selected" @endif value="{!! langPart('application.form.transcript.select1','0.0-2.0') !!}">{!! langPart('application.form.transcript.select1','0.0-2.0') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select2','2.1-2.5')) selected="selected" @endif value="{!! langPart('application.form.transcript.select2','2.1-2.5') !!}">{!! langPart('application.form.transcript.select2','2.1-2.5') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select3','2.6-3.0')) selected="selected" @endif value="{!! langPart('application.form.transcript.select3','2.6-3.0') !!}">{!! langPart('application.form.transcript.select3','2.6-3.0') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select4','3.1-3.5')) selected="selected" @endif value="{!! langPart('application.form.transcript.select4','3.1-3.5') !!}">{!! langPart('application.form.transcript.select4','3.1-3.5') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select5','3.6-3.8')) selected="selected" @endif value="{!! langPart('application.form.transcript.select5','3.6-3.8') !!}">{!! langPart('application.form.transcript.select5','3.6-3.8') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select6','3.9-4.0')) selected="selected" @endif value="{!! langPart('application.form.transcript.select6','3.9-4.0') !!}">{!! langPart('application.form.transcript.select6','3.9-4.0') !!}</option>
                                                        </select>
                                                        <select name="application.form.transcript.point2" class="form-select chosenSelect" id="transkriptLastSelect1" aria-label="{!! langPart('application.form.transcript.point2','Transkript Notunuz Nedir?') !!}">
                                                            <option selected disabled value="">{!! langPart('application.form.transcript.point','Transkript Notunuz Nedir?') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select7','97-100')) selected="selected" @endif value="{!! langPart('application.form.transcript.select7','97-100') !!}">{!! langPart('application.form.transcript.select7','97-100') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select8','93-96')) selected="selected" @endif value="{!! langPart('application.form.transcript.select8','93-96') !!}">{!! langPart('application.form.transcript.select8','93-96') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select9','90-92')) selected="selected" @endif value="{!! langPart('application.form.transcript.select9','90-92') !!}">{!! langPart('application.form.transcript.select9','90-92') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select10','87-89')) selected="selected" @endif value="{!! langPart('application.form.transcript.select10','87-89') !!}">{!! langPart('application.form.transcript.select10','87-89') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select11','83-86')) selected="selected" @endif value="{!! langPart('application.form.transcript.select11','83-86') !!}">{!! langPart('application.form.transcript.select11','83-86') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select12','80-82')) selected="selected" @endif value="{!! langPart('application.form.transcript.select12','80-82') !!}">{!! langPart('application.form.transcript.select12','80-82') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select13','77-79')) selected="selected" @endif value="{!! langPart('application.form.transcript.select13','77-79') !!}">{!! langPart('application.form.transcript.select13','77-79') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select14','73-76')) selected="selected" @endif value="{!! langPart('application.form.transcript.select14','73-76') !!}">{!! langPart('application.form.transcript.select14','73-76') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select15','70-72')) selected="selected" @endif value="{!! langPart('application.form.transcript.select15','70-72') !!}">{!! langPart('application.form.transcript.select15','70-72') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select16','67-69')) selected="selected" @endif value="{!! langPart('application.form.transcript.select16','67-69') !!}">{!! langPart('application.form.transcript.select16','67-69') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.select17','65-66')) selected="selected" @endif value="{!! langPart('application.form.transcript.select17','65-66') !!}">{!! langPart('application.form.transcript.select17','65-66') !!}</option>
                                                            <option @if(session('application_form_transcript_point2')==langPart('application.form.transcript.point.option','65\'in altında')) selected="selected" @endif value="{!! langPart('application.form.transcript.point.option','65\'in altında') !!}">{!! langPart('application.form.transcript.point.option','65\'in altında') !!}</option>
                                                        </select>

                                                        <select name="application.form.transcript.point2" class="form-select chosenSelect" id="transkriptNewLastSelect1" aria-label="{!! langPart('application.form.transcript.point2','Transkript Notunuz Nedir?') !!}">
                                                            <option selected disabled value="">{!! langPart('application.form.transcript.point','Transkript Notunuz Nedir?') !!}</option>
                                                            <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.ects01','A (9 - 10)')) selected="selected" @endif value="{!! langPart('application.form.transcript.ects01','A (9 - 10)') !!}">{!! langPart('application.form.transcript.ects01','A (9 - 10)') !!}</option>
                                                            <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.ects02','B (8 - 9)')) selected="selected" @endif value="{!! langPart('application.form.transcript.ects02','B (8 - 9)') !!}">{!! langPart('application.form.transcript.ects02','B (8 - 9)') !!}</option>
                                                            <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.ects03','C (7-8)')) selected="selected" @endif value="{!! langPart('application.form.transcript.ects03','C (7-8)') !!}">{!! langPart('application.form.transcript.ects03','C (7-8)') !!}</option>
                                                            <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.ects04','D (6 - 7)')) selected="selected" @endif value="{!! langPart('application.form.transcript.ects04','D (6 - 7)') !!}">{!! langPart('application.form.transcript.ects04','D (6 - 7)') !!}</option>
                                                            <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.ects05','E (6)')) selected="selected" @endif value="{!! langPart('application.form.transcript.ects05','E (6)') !!}">{!! langPart('application.form.transcript.ects05','E (6)') !!}</option>
                                                            <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.ects06','FX (5)')) selected="selected" @endif value="{!! langPart('application.form.transcript.ects06','FX (5)') !!}">{!! langPart('application.form.transcript.ects06','FX (5)') !!}</option>
                                                            <option @if(session('application_form_transcript_point')==langPart('application.form.transcript.ects07','F (1 - 4)')) selected="selected" @endif value="{!! langPart('application.form.transcript.ects07','F (1 - 4)') !!}">{!! langPart('application.form.transcript.ects07','F (1 - 4)') !!}</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            {!! langPart('application.form.transcript.error','Lütfen Transkript Notunuzu Seçiniz.') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cols_2">
                                                    <div class="form-group noSearchList">
                                                        <select name="application.form.transcriptscale2" class="form-select chosenSelect" id="skala1" aria-label="{!! langPart('application.form.transcriptscale2','Skala') !!}" required>
                                                            <option disabled value="">{!! langPart('application.form.transcriptscale','Skala') !!}</option>
                                                            <option @if(session('application_form_transcriptscale2')=='skala-4') selected="selected" @endif value="skala-4" selected>{!! langPart('application.form.transcriptscale.option1','4\'lü Skala') !!}</option>
                                                            <option @if(session('application_form_transcriptscale2')=='skala-100') selected="selected" @endif value="skala-100">{!! langPart('application.form.transcriptscale.option2','100\'lü Skala') !!}</option>
                                                            <option @if(session('application_form_transcriptscale2')=='ects') selected="selected" @endif value="ects">{!! langPart('application.form.transcriptscale.option3','ECTS') !!}</option>
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            {!! langPart('application.form.transcriptscale.error','Lütfen Skala Bilgisi Seçiniz.') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group noSearchList">
                                                <select name="application.form.university.class.title2" class="form-select form-control chosenSelect" id="whichGrade1" aria-label="{!! langPart('application.form.university.class.title2','Kaçıncı Sınıftasın?') !!}">
                                                    <option selected disabled value="">{!! langPart('application.form.university.class.title2','Kaçıncı Sınıftasın?') !!}</option>
                                                    <option @if(session('application_form_university_class_title2')==langPart('application.form.university.preparation','Hazırlık')) selected="selected" @endif  value="{!! langPart('application.form.university.preparation','Hazırlık') !!}">{!! langPart('application.form.university.preparation','Hazırlık') !!}</option>
                                                    <option @if(session('application_form_university_class_title2')=='1.'.langPart('application.form.university.class.text','Sınıf')) selected="selected" @endif value="1.{!! langPart('application.form.university.class.text','Sınıf') !!}">1.{!! langPart('application.form.university.class.text','Sınıf') !!}</option>
                                                    <option @if(session('application_form_university_class_title2')=='2.'.langPart('application.form.university.class.text','Sınıf')) selected="selected" @endif value="2.{!! langPart('application.form.university.class.text','Sınıf') !!}">2.{!! langPart('application.form.university.class.text','Sınıf') !!}</option>
                                                    <option @if(session('application_form_university_class_title2')=='3.'.langPart('application.form.university.class.text','Sınıf')) selected="selected" @endif value="3.{!! langPart('application.form.university.class.text','Sınıf') !!}">3.{!! langPart('application.form.university.class.text','Sınıf') !!}</option>
                                                    <option @if(session('application_form_university_class_title2')=='4.'.langPart('application.form.university.class.text','Sınıf')) selected="selected" @endif value="4.{!! langPart('application.form.university.class.text','Sınıf') !!}">4.{!! langPart('application.form.university.class.text','Sınıf') !!}</option>
                                                    <option @if(session('application_form_university_class_title2')==langPart('application.form.university.newgraduated','Yeni Mezun')) selected="selected" @endif value="{!! langPart('application.form.university.newgraduated','Yeni Mezun') !!}">{!! langPart('application.form.university.newgraduated','Yeni Mezun') !!}</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    {!! langPart('application.form.university.class.error','Lütfen Kaçıncı Sınıftasın? Seçiniz.') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group datepickerActive">
                                                <input name="application.form.datestart2" type="text" class="form-control datepicker" placeholder="{!! langPart('application.form.datestart2','Üniversite Başlama Tarihi') !!}"  value="{{session('application_form_datestart2')}}" id="otherdate1">
                                                <div class="invalid-feedback">
                                                    {!! langPart('application.form.date.error','Lütfen Tarih Seçiniz.') !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group datepickerActive">
                                                <input name="application.form.dateend2" type="text" class="form-control datepicker" placeholder="{!! langPart('application.form.dateend2','Üniversite Bitiş Tarihi') !!}" value="{{session('application_form_dateend2')}}" id="otherdate2">
                                                <div class="invalid-feedback">
                                                    {!! langPart('application.form.date.error','Lütfen Tarih Seçiniz.') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit d-flex align-items-center justify-content-center">
                                        <button type="submit" aria-label="{!! langPart('application.form.button1','DEVAM ET') !!}" class="bg-green color-white"><span>{!! langPart('application.form.button1','DEVAM ET') !!}</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('scripts')


    <script type="text/javascript" src="{!! asset("assets/js/chosen.js") !!}"></script>
    <script type="text/javascript" src="{!! asset("assets/js/bootstrap-datepicker.min.js") !!}"></script>
    <script type="text/javascript" src="{!! asset("assets/js/bootstrap-datepicker.tr.min.js") !!}"></script>
    <script type="text/javascript" src="{!! asset("assets/js/form.js?v=").time() !!}"></script>
    <style>
        #transkriptLastSelect,#transkriptLastSelect_chosen,#transkriptNewLastSelect,#transkriptNewLastSelect_chosen,#transkriptNewLastSelect1,#transkriptNewLastSelect1_chosen,#transkriptLastSelect1,#transkriptLastSelect1_chosen{
            display: none;
        }
    </style>
    <script>

        $('#transkriptNewLastSelect').prop('required',false);
        $('#transkriptLastSelect').prop('required',false);

        $('html:lang(en) #searchChosenInput').attr("placeholder", "Search...");

        $(document).ready(function (){


            var universityManual = localStorage.getItem("universityManual");
            var universityManual2 = localStorage.getItem("universityManual2");

            if(universityManual=='1'){
                $('#universityManualAll').removeClass('d-none');
                $('#universityManual').removeClass('d-none').prop("disabled", false);
                $('#universityBranchManual').removeClass('d-none').prop("disabled", false);
                $('#universityBranchSelect').addClass('d-none').prop("disabled", true);
                $('#universityBranchSelect_chosen').hide();
                $('#universitySelect').val("-1").trigger('chosen:updated');
            }


            if(universityManual2=='1'){
                $('#universityManual2All').removeClass('d-none');
                $('#universityManual2').removeClass('d-none').prop("disabled", false);
                $('#universityBranchManual2').removeClass('d-none').prop("disabled", false);
                $('#universityBranchSelect2').addClass('d-none').prop("disabled", true);
                $('#universityBranchSelect2_chosen').hide();
                $('#universitySelect2').val("-1").trigger('chosen:updated');
            }
        });


        @if(session('application_form_university2st')==langPart('application.form.yes','Evet'))

        $(document).ready(function (){
            $('.otherForm').removeClass('hidden');
            $('.otherForm .form-control').prop('required',true);
            $('#transkriptFirstSelect1').prop('required',true);
            $('#transkriptLastSelect1').prop('required',false);

        });

        @endif

        @if(session('application_form_transcriptscale2')=='skala-100')
            $(document).ready(function (){
                $('#transkriptFirstSelect1_chosen,#transkriptNewLastSelect1_chosen').css('display','none');
                $('#transkriptLastSelect1_chosen').css('display','flex');
                $('#transkriptFirstSelect1,#transkriptNewLastSelect1').prop('required',false);
                $('#transkriptLastSelect1').prop('required',true);
            });
        @endif

        @if(session('application_form_transcriptscale2')=='ects')
        $(document).ready(function (){
            $('#transkriptFirstSelect1_chosen,#transkriptLastSelect1_chosen').css('display','none');
            $('#transkriptNewLastSelect1_chosen').css('display','flex');
            $('#transkriptFirstSelect1,#transkriptLastSelect1_chosen').prop('required',false);
            $('#transkriptNewLastSelect1').prop('required',true);
        });
        @endif

        @if(session('application_form_transcriptscale')=='skala-100')
            $(document).ready(function (){
                $('#transkriptFirstSelect_chosen,#transkriptNewLastSelect_chosen').css('display','none');
                $('#transkriptLastSelect_chosen').css('display','flex');
                $('#transkriptFirstSelect,#transkriptNewLastSelect').prop('required',false);
                $('#transkriptLastSelect').prop('required',true);
            });
        @endif

        @if(session('application_form_transcriptscale')=='ects')
        $(document).ready(function (){
            $('#transkriptFirstSelect_chosen,#transkriptLastSelect_chosen').css('display','none');
            $('#transkriptNewLastSelect_chosen').css('display','flex');
            $('#transkriptFirstSelect,#transkriptLastSelect_chosen').prop('required',false);
            $('#transkriptNewLastSelect').prop('required',true);
        });
        @endif

        $('#questionSchool').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'Evet' || selectedValue === 'Yes') {
                $('.otherForm').removeClass('hidden');
                $('.otherForm .form-control').prop('required',true);
                $('#transkriptFirstSelect1').prop('required',true);
                $('#transkriptLastSelect1').prop('required',false);
            } else {
                $('.otherForm').addClass('hidden');
                $('#transkriptFirstSelect1').prop('required',false);
                $('#transkriptLastSelect1').prop('required',false);
                $('.otherForm .form-control').prop('required',false);
            }
        });

        $('#universitySelect').on('change', function() {
            var id = $(this).find(':selected').attr('data-id');
            if(id=='-1'){
                localStorage.setItem("universityManual", 1);
                $('#universityManualAll').removeClass('d-none');
                $('#universityManual').removeClass('d-none').prop("disabled", false);
                $('#universityBranchManual').removeClass('d-none').prop("disabled", false);
                $('#universityBranchSelect').addClass('d-none').prop("disabled", true);
                $('#universityBranchSelect_chosen').hide();
            } else {
                localStorage.setItem("universityManual", 0);
                $('#universityManualAll').addClass('d-none');
                $('#universityManual').addClass('d-none').prop("disabled", true);
                $('#universityBranchManual').addClass('d-none').prop("disabled", true);
                $('#universityBranchSelect').removeClass('d-none').prop("disabled", false);
                $('#universityBranchSelect_chosen').show();
                GetUnivercityBranchs(id,'universityBranchSelect')
            }
        });


        $('#universitySelect2').on('change', function() {
            var id = $(this).find(':selected').attr('data-id');
            if(id=='-1'){
                localStorage.setItem("universityManual2", 1);
                $('#universityManual2All').removeClass('d-none');
                $('#universityManual2').removeClass('d-none').prop("disabled", false);
                $('#universityBranchManual2').removeClass('d-none').prop("disabled", false);
                $('#universityBranchSelect2').addClass('d-none').prop("disabled", true);
                $('#universityBranchSelect2_chosen').hide();
            } else {
                localStorage.setItem("universityManual2", 0);
                $('#universityManual2All').addClass('d-none');
                $('#universityManual2').addClass('d-none').prop("disabled", true);
                $('#universityBranchManual2').addClass('d-none').prop("disabled", true);
                $('#universityBranchSelect2').removeClass('d-none').prop("disabled", false);
                $('#universityBranchSelect2_chosen').show();
                GetUnivercityBranchs(id,'universityBranchSelect2')
            }
        });


        function GetUnivercityBranchs(id,div){
            $.ajax({
                url: '/GetUnivercityBranchs/{{$mediapress->activeLanguage->code}}/'+id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#'+div).empty();
                    $('#'+div).append('<option selected disabled value="">{!! langPart('application.form.university.departmant','Bölüm') !!}</option>');
                    $.each(data, function(key, value) {
                        $('#'+div).append("<option value='" + value + "'>" + value + "</option>");
                    });
                    $('#'+div).trigger("chosen:updated");
                }
            });
        }


        $('#skala').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'skala-100') {
                // Seçilen değer 100'lü Skala ise burada yapılacak işlemleri ekleyebilirsiniz.
                $('#transkriptFirstSelect_chosen,#transkriptNewLastSelect_chosen').css('display','none');
                $('#transkriptLastSelect_chosen').css('display','flex');
                $('#transkriptFirstSelect,#transkriptNewLastSelect').prop('required',false);
                $('#transkriptLastSelect').prop('required',true);
            }
            else if (selectedValue === 'ects') {
                // Seçilen değer 4'lü Skala ise burada yapılacak işlemleri ekleyebilirsiniz.
                $('#transkriptLastSelect_chosen,#transkriptFirstSelect_chosen').css('display','none');
                $('#transkriptNewLastSelect_chosen').css('display','flex');
                $('#transkriptLastSelect,#transkriptFirstSelect').prop('required',false);
                $('#transkriptNewLastSelect').prop('required',true);
            }
            else {
                // Diğer durumlar için gerekirse başka işlemleri ekleyebilirsiniz.
                $('#transkriptLastSelect_chosen,#transkriptNewLastSelect_chosen').css('display','none');
                $('#transkriptFirstSelect_chosen').css('display','flex');
                $('#transkriptLastSelect,#transkriptNewLastSelect').prop('required',false);
                $('#transkriptFirstSelect').prop('required',true);
            }
        });

        $('#skala1').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'skala-100') {
                // Seçilen değer 100'lü Skala ise burada yapılacak işlemleri ekleyebilirsiniz.
                $('#transkriptFirstSelect1_chosen,#transkriptNewLastSelect1_chosen').css('display','none');
                $('#transkriptLastSelect1_chosen').css('display','flex');
                $('#transkriptFirstSelect1,#transkriptNewLastSelect1').prop('required',false);
                $('#transkriptLastSelect1').prop('required',true);
            }
            else if (selectedValue === 'ects') {
                // Seçilen değer 4'lü Skala ise burada yapılacak işlemleri ekleyebilirsiniz.
                $('#transkriptFirstSelect1_chosen,#transkriptLastSelect1_chosen').css('display','none');
                $('#transkriptNewLastSelect1_chosen').css('display','flex');
                $('#transkriptFirstSelect1,#transkriptLastSelect1').prop('required',false);
                $('#transkriptNewLastSelect1').prop('required',true);
            }
            else {
                // Diğer durumlar için gerekirse başka işlemleri ekleyebilirsiniz.
                $('#transkriptLastSelect1_chosen,#transkriptNewLastSelect1_chosen').css('display','none');
                $('#transkriptFirstSelect1_chosen').css('display','flex');
                $('#transkriptLastSelect1,#transkriptNewLastSelect1').prop('required',false);
                $('#transkriptFirstSelect1').prop('required',true);
            }
        });

        $('.datepicker').datepicker({
            format: 'dd.mm.yyyy', // Gün.Ay.Yıl formatı
            language: '{{strtolower($mediapress->activeLanguage->code)}}', // Türkçe dil dosyasını kullan
        });

        $('.datepicker').datepicker({
            format: 'dd.mm.yyyy', // Gün.Ay.Yıl formatı
            language: 'tr', // Türkçe dil dosyasını kullan
        });

        $('.datepicker').on('click', function(e) {
            e.preventDefault(); // Varsayılan tıklama eylemini engelle
            $(this).datepicker('show'); // Datepicker'i göster
        });

        $('.datepicker').on('keydown', function(e) {
            e.preventDefault(); // Klavye girişlerini engelle
        });

        $('.stepList ol li:first-child').addClass('prev');
    </script>
@endpush
