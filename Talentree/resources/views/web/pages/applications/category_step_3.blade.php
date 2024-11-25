@extends('web.inc.app')
@push('styles')
    <link rel="stylesheet" href="{!! asset("assets/css/form.css?v=").time() !!}">
    <link rel="stylesheet" href="{!! asset("assets/css/page.css?v=").time() !!}">
    <link rel="stylesheet" href="{!! asset("assets/css/applyPage.css?v=").time() !!}">


@endpush
@php
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
                                <li><a href="javascript:void(0);">{!! langPart('application.form.step_2','Eğitim Bilgileri') !!}</a></li>
                                <li class="active"><a href="javascript:void(0);">{!! langPart('application.form.step_3','Diğer Bilgiler') !!}</a></li>
                            </ol>
                        </div>
                        <div class="formPage">
                            <form class="row g-3 needs-validation" method="POST" action="{{url('/applications/step/3')}}" autocomplete="off" novalidate>
                                @csrf
                                <input type="hidden" name="formUrl" value="{{url($category->detail->url)}}">
                                <div class="@if($category->id>5){{'col-md-12'}}@else{{'col-md-6'}}@endif">
                                    <div class="form-group noSearchList">
                                        <select name="application.form.englishlevel" class="form-select form-control chosenSelect" id="languageLevel" aria-label="{!! langPart('application.form.englishlevel','İngilizce Seviyen') !!}" required>
                                            <option selected disabled value="">{!! langPart('application.form.englishlevel','İngilizce Seviyen') !!}</option>
                                            <option value="{!! langPart('application.form.englishlevel.option1','A1- Başlangıç (Beginner)') !!}">{!! langPart('application.form.englishlevel.option1','A1- Başlangıç (Beginner)') !!}</option>
                                            <option value="{!! langPart('application.form.englishlevel.option2','A2- Temel (Elementary)') !!}">{!! langPart('application.form.englishlevel.option2','A2- Temel (Elementary)') !!}</option>
                                            <option value="{!! langPart('application.form.englishlevel.option3','B1- Orta Seviye Öncesi (Pre-Intermediate)') !!}">{!! langPart('application.form.englishlevel.option3','B1- Orta Seviye Öncesi (Pre-Intermediate)') !!}</option>
                                            <option value="{!! langPart('application.form.englishlevel.option4','B2- Orta Seviye (Intermediate)') !!}">{!! langPart('application.form.englishlevel.option4','B2- Orta Seviye (Intermediate)') !!}</option>
                                            <option value="{!! langPart('application.form.englishlevel.option5','C1- Orta Seviyenin Üstü (Upper-Indermediate)') !!}">{!! langPart('application.form.englishlevel.option5','C1- Orta Seviyenin Üstü (Upper-Indermediate)') !!}</option>
                                            <option value="{!! langPart('application.form.englishlevel.option6','C2- İleri (Advanced)') !!}">{!! langPart('application.form.englishlevel.option6','C2- İleri (Advanced)') !!}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.please.select','Lütfen Seçiniz.') !!}
                                        </div>
                                    </div>
                                </div>
                                @if($category->id==5)
                                <div class="col-md-6">
                                    <div class="form-group noSearchList">
                                        <select name="application.form.interntype" class="form-select form-control chosenSelect" id="stajtype" aria-label="{!! langPart('application.form.interntype','Stajının Türü Nedir?') !!}" required>
                                            <option selected disabled value="">{!! langPart('application.form.interntype','Stajının Türü Nedir?') !!}</option>
                                            <option value="{!! langPart('application.form.interntype.option1','Zorunlu') !!}">{!! langPart('application.form.interntype.option1','Zorunlu') !!}</option>
                                            <option value="{!! langPart('application.form.interntype.option2','İsteğe Bağlı / Gönüllü') !!}">{!! langPart('application.form.interntype.option2','İsteğe Bağlı / Gönüllü') !!}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.please.select','Lütfen Seçiniz.') !!}
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group noSearchList">
                                        <select name="application.form.internquest" class="form-select form-control chosenSelect" id="stajQuestion" aria-label="{!! langPart('application.form.internquest','Daha Önceden Staj Deneyimin Oldu Mu?') !!}" required>
                                            <option selected disabled value="">{!! langPart('application.form.internquest','Daha Önceden Staj Deneyimin Oldu Mu?') !!}</option>
                                            <option value="{!! langPart('application.form.yes','Evet') !!}">{!! langPart('application.form.yes','Evet') !!}</option>
                                            <option value="{!! langPart('application.form.no','Hayır') !!}">{!! langPart('application.form.no','Hayır') !!}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.please.select','Lütfen Seçiniz.') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="application.form.internquest2" type="text" class="form-control" id="stajQuestionInput" disabled placeholder="{!! langPart('application.form.internquest2','Evet İse Hangi Şirket ve Hangi Departmanda Oldu?') !!}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group noSearchList">
                                        <select name="application.form.internquest3" class="form-select form-control chosenSelect" id="workQuestion" aria-label="{!! langPart('application.form.internquest3','Daha Önceden İş Deneyimin Oldu mu?') !!}" required>
                                            <option selected disabled value="">{!! langPart('application.form.internquest3','Daha Önceden İş Deneyimin Oldu mu?') !!}</option>
                                            <option value="{!! langPart('application.form.yes','Evet') !!}">{!! langPart('application.form.yes','Evet') !!}</option>
                                            <option value="{!! langPart('application.form.no','Hayır') !!}">{!! langPart('application.form.no','Hayır') !!}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.please.select','Lütfen Seçiniz.') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="application.form.internquest4" type="text" class="form-control" id="workQuestionInput" disabled placeholder="{!! langPart('application.form.internquest4','Evet İse Hangi Şirket ve Hangi Departmanda Oldu?') !!}">
                                    </div>
                                </div>

                                @if($category->id==5)
                                    @php //staj programı @endphp
                                    <div class="col-md-6">
                                        <div class="form-group noSearchList">
                                            <select name="application.form.internquest5" class="form-select form-control chosenSelect" id="stajLocation" aria-label="{!! langPart('application.form.internquest5','Stajını Hangi Lokasyonumuzda Yapmak İstersin?') !!}" required>
                                                <option selected disabled value="">{!! langPart('application.form.internquest5','Stajını Hangi Lokasyonumuzda Yapmak İstersin?') !!}</option>
                                                @foreach($LocationList as $location)
                                                    @if($location!='-')
                                                        <option value="{{$location}}">{{$location}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                {!! langPart('application.form.please.select','Lütfen Seçiniz.') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group otherFormGroup">
                                            <span><small>{!! langPart('application.form.internquest6','Stajını Hangi Departmanda Yapmak İstersin?') !!}</small> <i class="checkedCount"></i></span>
                                            <div class="selectBox">
                                                <div class="listing">

                                                    @foreach($DepertmanList as $depertman)
                                                        @if($depertman!='-')
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" id="{{slug($depertman)}}" name="departmentInput_{{slug($depertman)}}" required>
                                                                <label class="form-check-label" for="{{slug($depertman)}}">
                                                                    {{$depertman}}
                                                                </label>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="invalid-feedback">
                                                {!! langPart('application.form.please.select','Lütfen Seçiniz.') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="application.form.internquest7" class="form-control" placeholder="{!! langPart('application.form.internquest7','Kastamonu Entegre Şirketini Ve Talentree Staj Programı’nı Tercih Etme Nedenlerini Bizimle Paylaşır Mısın?') !!}" required></textarea>
                                            <div class="invalid-feedback">
                                                {!! langPart('application.form.please.empty','Lütfen Boş Bırakmayınız.') !!}
                                            </div>
                                        </div>
                                    </div>
                                @elseif($category->id==6)
                                    @php //ideathon @endphp

                                    <div class="col-md-6">
                                        <div class="form-group noSearchList">
                                            <select name="application.form.howteam" class="form-select form-control chosenSelect" id="teamQuestion" aria-label="{!! langPart('application.form.howteam','Bir Takım Olarak mı Başvuruyorsunuz?') !!}" required>
                                                <option selected disabled value="">{!! langPart('application.form.howteam','Bir Takım Olarak mı Başvuruyorsunuz?') !!}</option>
                                                <option value="{!! langPart('application.form.yes','Evet') !!}">{!! langPart('application.form.yes','Evet') !!}</option>
                                                <option value="{!! langPart('application.form.no','Hayır') !!}">{!! langPart('application.form.no','Hayır') !!}</option>
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
                                                    {!! langPart('application.form.teamfriends','Takım Arkadaşlarının Adı Soyadı') !!}
                                                    <span>{!! langPart('application.form.teamfriends.text','*Her Takım Üyesi Bireysel Başvurusunu Tamamlamalıdır.') !!}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 shareholder">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input name="application.form.please.team.friend.name[]" type="text" class="form-control" placeholder="{!! langPart('application.form.please.team.friend.name','Takım Arkadaşı Adı') !!}">
                                                            <div class="invalid-feedback">
                                                                {!! langPart('application.form.please.selectnotnull','Lütfen boş bırakmayınız.') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input name="application.form.please.team.friend.surname[]" type="text" class="form-control" placeholder="{!! langPart('application.form.please.team.friend.surname','Takım Arkadaşı Soyadı') !!}">
                                                            <div class="invalid-feedback">
                                                                {!! langPart('application.form.please.selectnotnull','Lütfen boş bırakmayınız.') !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 moreBtnAction text-center">
                                                        <button class="plus" type="button"><i class="fal fa-plus"></i>{!! langPart('application.form.please.team.more','Daha fazla') !!}</button>
                                                        <button class="minus" type="button"><i class="fal fa-minus"></i>{!! langPart('application.form.please.team.remove','Kaldır') !!}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="application.form.ideathon.quest" class="form-control" placeholder="{!! langPart('application.form.ideathon.quest','İklim Değişikliği ve Küresel İklim Krizine Yönelik Neler Yapılabilir?') !!}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="application.form.ideathon.quest2" class="form-control" placeholder="{!! langPart('application.form.ideathon.quest2','Ağaç Bazlı Panel Sektörüne Yönelik İnovatif Bir Fikir Geliştirecek Olsanız Ne Yapardınız?') !!}"></textarea>
                                        </div>
                                    </div>

                                @elseif($category->id==7)
                                    @php //Teknik Gezi @endphp

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="application.form.ideathon.quest3" class="form-control" placeholder="{!! langPart('application.form.ideathon.quest3','Teknik Gezi İlanımızı Nereden Duydun?') !!}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="application.form.ideathon.quest4" class="form-control" placeholder="{!! langPart('application.form.ideathon.quest4','Neden Kastamonu Entegre Teknik Gezisine Katılmak İstiyorsun?') !!}"></textarea>
                                        </div>
                                    </div>
                                @endif



                                <div class="col-md-12">
                                    <div class="submit d-flex align-items-center justify-content-center">
                                        <button type="submit" aria-label="{!! langPart('application.form.button2','BAŞVURUNU TAMAMLA') !!}" class="bg-green color-white"><span>{!! langPart('application.form.button2','BAŞVURUNU TAMAMLA') !!}</span></button>
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
    <script type="text/javascript" src="{!! asset("assets/js/form.js?v=").time() !!}"></script>
    <script>

        $('#stajQuestion').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'Evet' || selectedValue === 'Yes') {
                $('#stajQuestionInput').prop("disabled", false);
            } else {
                $('#stajQuestionInput').prop("disabled", true);
            }
        });

        $('#workQuestion').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'Evet' || selectedValue === 'Yes') {
                $('#workQuestionInput').prop("disabled", false);
            } else {
                $('#workQuestionInput').prop("disabled", true);
            }
        });

        $('#teamQuestion').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'Evet' || selectedValue === 'Yes') {
                $('.otherForm').removeClass('hidden');
                $('.otherForm .form-control').prop('required',true);
            } else {
                $('.otherForm').addClass('hidden');
                $('.otherForm .form-control').prop('required',false);
            }
        });

        addedPeople();
        function addedPeople(){
            $('.moreBtnAction .plus').click(function (){
                var e = $(this).parent().parent();
                $first = e.first();
                copy = $first.clone().insertAfter(e);
                copy.removeClass('first').addClass('clone').find('input').val("");
                $('.clone .plus').addClass('hide')
                $('.clone .minus').addClass('active');
                $('.clone .minus').click(function (){
                    $(this).parent().parent().remove();
                });
            });

        }
        $('.otherFormGroup').each(function(){
            $('.otherFormGroup span').click(function (){
                $(this).parent().find('.selectBox').toggleClass('active');
            });

            $('input[name^="departmentInput"]').on('change', function() {
                var checkedCount = $('input[name^="departmentInput"]:checked').length;
                $('.checkedCount').text(checkedCount+' {!! langPart('form.application.selected','seçenek seçildi.') !!}');
                if (checkedCount === 0) {
                    $('.otherFormGroup .invalid-feedback').show();
                    $('input[name^="departmentInput"]').prop('required',true);
                    $('.checkedCount').text('');
                    $('.otherFormGroup small').removeClass('active');
                }
                else{
                    $('.otherFormGroup .invalid-feedback').hide();
                    $('input[name^="departmentInput"]').prop('required',false);
                    $('.otherFormGroup small').addClass('active');
                }
                if (checkedCount > 3) {
                    alert('{!! langPart('form.application.maxthree','Maksimum 3 seçenek seçebilirsiniz.') !!}');
                    $(this).prop('checked', false);
                    checkedCount = 3;
                    $('.checkedCount').text(checkedCount+' {!! langPart('form.application.selected','seçenek seçildi.') !!}');
                }
            });
        });
        $('.stepList ol li:first-child,.stepList ol li:nth-child(2)').addClass('prev');
    </script>
@endpush
