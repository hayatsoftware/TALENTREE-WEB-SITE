@extends('web.inc.app')
@push('styles')
    <link rel="stylesheet" href="{!! asset("assets/css/form.css?v=").time() !!}">
    <link rel="stylesheet" href="{!! asset("assets/css/page.css?v=").time() !!}">
    <link rel="stylesheet" href="{!! asset("assets/css/intlTelInput.min.css?v=").time() !!}">
    <link rel="stylesheet" href="{!! asset("assets/css/bootstrap-datepicker.min.css") !!}">
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
                        <div class="justButton d-flex align-items-center justify-content-center mb-5">
                            @if($page->f_pdf)
                            <a href="{{url($page->f_pdf)}}" target="_blank"><span><img src="{{asset('assets/img/pdf-ico.svg')}}" alt="">{{$category->detail->name}} {!! langPart('faq.button','Sıkça Sorulanlar') !!}</span></a>
                            @endif
                        </div>
                        <div class="stepList mb-5">
                            <ol>
                                <li class="active"><a href="javascript:void(0);">{!! langPart('application.form.step_1','Kişisel Bilgiler') !!}</a></li>
                                <li><a href="javascript:void(0);">{!! langPart('application.form.step_2','Eğitim Bilgileri') !!}</a></li>
                                <li><a href="javascript:void(0);">{!! langPart('application.form.step_3','Diğer Bilgiler') !!}</a></li>
                            </ol>
                        </div>
                        <div class="formPage">
                            <form  class="row g-3 needs-validation" id="step1" method="POST" action="{{url('/applications/step/1')}}" autocomplete="off" novalidate>
                                @csrf
                                <input type="hidden" title="{!! langPart('application.form.program','Başvuru Programı') !!}" name="application.form.program" value="{{$category->detail->name}}">
                                <input type="hidden" name="formUrl" value="{{url($category->detail->url)}}">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="application.form.namesurname" type="text" value="{{session('application_form_namesurname')}}" class="form-control only-text" placeholder="{!! langPart('application.form.namesurname','Ad Soyad') !!}" id="firstName" required>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.namesurname.error','Lütfen İsim Soyisim Giriniz.') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group phone_group">
                                        <label class="form-label noPosition" aria-label="Telefon Numarası">
                                            <!--{!! langPart('application.form.phone','Telefon Numarası') !!}!-->
                                            <input type="text" name="application.form.phone" id="phoneNumber" class="phone form-control telmask trMask" value="{{session('application_form_phone')}}" required>
                                            <div class="invalid-feedback">
                                                {!! langPart('application.form.phone.error','Lütfen Telefon Numarası Giriniz.') !!}
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="application.form.email" type="text" class="form-control" placeholder="{!! langPart('application.form.email','E-Mail') !!}" id="eMail" pattern="[^ @]*@[^ @]*" onkeyup="javascript:checkEmail()" value="{{session('application_form_email')}}" required>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.email.error','Lütfen E-Mail Adresini Giriniz.') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name="application.form.email2" type="text" class="form-control" placeholder="{!! langPart('application.form.email2','E-Mail Tekrar') !!}" id="eMail_confirmation" pattern="[^ @]*@[^ @]*" value="{{session('application_form_email2')}}" required>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.email.error2','E-mail Adresleri Uyuşmuyor.') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="application.form.distinct" class="form-select form-control chosenSelect" onchange="getDistricts()" id="city" aria-label="{!! langPart('application.form.distinct','İkamet Ettiğin İl') !!}" required>
                                            <option selected disabled value="">{!! langPart('application.form.distinct','İkamet Ettiğin İl') !!}</option>
                                            <option data-id="-1" value="-1">{!! langPart('application.form.other.option','Diğer') !!}</option>
                                            @foreach($provinces as $province)
                                                <option @if(session('application_form_distinct')==$province) selected="selected" @endif value="{{$province}}">{{$province}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.distinct.error','Lütfen İkamet Ettiğin İl\'i Seçiniz.') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 d-none" id="cityManualAll">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="text" name="application.form.distinct" id="cityManual" class="form-control d-none" placeholder="{!! langPart('application.form.distinct','İkamet Ettiğin İl') !!}" value="{{session('application_form_distinct')}}" disabled="disabled"  required>
                                            <div class="invalid-feedback">
                                                {!! langPart('application.form.distinct.error','Lütfen İkamet Ettiğin İl\'i Seçiniz.') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 cityDistrict">
                                    <div class="form-group">
                                        <select name="application.form.province" class="form-select form-control chosenSelect" id="district" aria-label="{!! langPart('application.form.province','İkamet Ettiğin İlçe') !!}" required>
                                            <option selected disabled value="">{!! langPart('application.form.province','İkamet Ettiğin İlçe') !!}</option>
                                            @if(session('application_form_province'))
                                                <option selected="selected" value="{{session('application_form_province')}}">{{session('application_form_province')}}</option>
                                            @endif
                                        </select>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.province.error','Lütfen İkamet Ettiğin İlçe\'yi Seçiniz.') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="application.form.placeofbirth" class="form-select form-control chosenSelect" id="placeBirth" aria-label="{!! langPart('application.form.placeofbirth','Doğum Yeri') !!}" required>
                                            <option selected disabled value="">{!! langPart('application.form.placeofbirth','Doğum Yeri') !!}</option>
                                            <option data-id="-1" value="-1">{!! langPart('application.form.other.option','Diğer') !!}</option>
                                            @foreach($provinces as $province)
                                                <option @if(session('application_form_placeofbirth')==$province) selected="selected" @endif value="{{$province}}">{{$province}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.placeofbirth.error','Lütfen Doğum Yeri Seçiniz.') !!}

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 d-none" id="placeOfBirthManualAll">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input type="text" name="application.form.placeofbirth" id="placeOfBirthManual" class="form-control d-none" placeholder="{!! langPart('application.form.placeofbirth','Doğum Yeri') !!}" value="{{session('application_form_placeofbirth')}}" disabled="disabled"  required>
                                            <div class="invalid-feedback">
                                                {!! langPart('application.form.placeofbirth.error','Lütfen Doğum Yeri Seçiniz.') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group datepickerActive">
                                        <input type="text" name="application.form.birthday" class="form-control" id="birthdayDatepicker" placeholder="{!! langPart('application.form.birthday','Doğum Tarihi') !!}" pattern=".{10}" value="{{session('application_form_birthday')}}" required>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.birthday.error','Lütfen Doğum Tarihi Giriniz.') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group noSearchList">
                                        <select name="application.form.gender" class="form-select form-control chosenSelect" id="gender" aria-label="{!! langPart('application.form.gender','Cinsiyet') !!}" required>
                                            <option selected disabled value="">{!! langPart('application.form.gender','Cinsiyet') !!}</option>
                                            <option @if(session('application_form_gender')==langPart('application.form.gender.men','Erkek')) selected="selected" @endif value="{!! langPart('application.form.gender.men','Erkek') !!}">{!! langPart('application.form.gender.men','Erkek') !!}</option>
                                            <option @if(session('application_form_gender')==langPart('application.form.gender.women','Kadın')) selected="selected" @endif value="{!! langPart('application.form.gender.women','Kadın') !!}">{!! langPart('application.form.gender.women','Kadın') !!}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {!! langPart('application.form.gender.error','Lütfen Cinsiyet Seçiniz.') !!}

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

    <script type="text/javascript" src="{!! asset("assets/js/intlTelInput.min.js?v=").time() !!}"></script>
    <script type="text/javascript" src="{!! asset("assets/js/jquery.mask.js") !!}"></script>
    <script type="text/javascript" src="{!! asset("assets/js/utils.js") !!}"></script>
    <script type="text/javascript" src="{!! asset("assets/js/chosen.js?v=").time() !!}"></script>
    <script type="text/javascript" src="{!! asset("assets/js/bootstrap-datepicker.min.js") !!}"></script>
    <script type="text/javascript" src="{!! asset("assets/js/bootstrap-datepicker.tr.min.js") !!}"></script>
    <script type="text/javascript" src="{!! asset("assets/js/form.js?v=").time() !!}"></script>


    <script>

        $(document).ready(function () {
            trMaskFunc();
        })

        function trMaskFunc(){
            $(".trMask").keyup("input propertychange paste", function (e) {
                var val = $(this).val()
                var reg = /^0/gi;
                if (val.match(reg)) {
                    $(this).val(val.replace(reg, ""));

                }
            });

        }

        $('.iti__country').click(function (){
            $('.telmask').removeClass('trMask');
            $(".telmask").off("input propertychange paste keyup");
        });
        $('.iti__preferred').click(function (){
            $('.telmask').addClass('trMask');
            trMaskFunc();
        });

        $('#eMail_confirmation').on('cut copy paste', function(event) {
            event.preventDefault();
            alert(' {!! langPart('application.form.email.error3','Lütfen E-mail Adresini Tekrar Giriniz.') !!}')
        });



        $('html:lang(en) #searchChosenInput').attr("placeholder", "Search...");
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


        $('#birthdayDatepicker').datepicker({
            format: 'dd.mm.yyyy', // Set the desired format
            language: '{{strtolower($mediapress->activeLanguage->code)}}', // Türkçe dil dosyasını kullan
            autoclose: true,
            startView: 'decade', // Show decade view first
            minViewMode: 'days' // Allow selection of days
        });

        $('#birthdayDatepicker').datepicker({
            format: 'dd.mm.yyyy', // Gün.Ay.Yıl formatı
            language: 'tr', // Türkçe dil dosyasını kullan
        });

        $('#birthdayDatepicker').on('click', function(e) {
            e.preventDefault(); // Varsayılan tıklama eylemini engelle
            $(this).datepicker('show'); // Datepicker'i göster
        });

        $('#birthdayDatepicker').on('keydown', function(e) {
            e.preventDefault(); // Klavye girişlerini engelle
        });

        function getDistricts(){
            var provinceId = $('#city').val();
            if(provinceId){
                $.ajax({
                    url: '/GetDistricts/'+provinceId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#district').empty();
                        $('#district').append('<option selected disabled value="">{!! langPart('application.form.province','İkamet Ettiğin İlçe') !!}</option>');
                        $.each(data, function(key, value) {
                                $('#district').append("<option value='" + value + "'>" + value + "</option>");
                        });
                        $('#district').trigger("chosen:updated");
                    }
                });
            }
        }


        @if($errors->any())
            $(document).ready(function (){
                alert('{{$errors->first()}}')
            });
        @endif

        $(document).ready(function (){

            $('#placeBirth').on('change', function() {
                var id = $(this).find(':selected').attr('data-id');
                if(id=='-1'){
                    localStorage.setItem("placeOfBirthManual", 1);
                    $('#placeOfBirthManualAll').removeClass('d-none');
                    $('#placeOfBirthManual').removeClass('d-none').prop("disabled", false);
                } else {
                    localStorage.setItem("placeOfBirthManual", 0);
                    $('#placeOfBirthManualAll').addClass('d-none');
                    $('#placeOfBirthManual').addClass('d-none').prop("disabled", true);
                }
            });

            var placeOfBirthManual = localStorage.getItem("placeOfBirthManual");

            if(placeOfBirthManual=='1'){
                $('#placeOfBirthManualAll').removeClass('d-none');
                $('#placeOfBirthManual').removeClass('d-none').prop("disabled", false);
                $('#placeBirth').val("-1").trigger('chosen:updated');
            }



            $('#city').on('change', function() {
                var id = $(this).find(':selected').attr('data-id');
                if(id=='-1'){
                    localStorage.setItem("cityManual", 1);
                    $('.cityDistrict').addClass('d-none');
                    $('#cityManualAll').removeClass('d-none');
                    $('#cityManual').removeClass('d-none').prop("disabled", false);

                    $('.cityDistrict').hide();
                    $('#district').addClass('d-none').prop("disabled", true);
                    $('#district_chosen').hide();

                } else {
                    localStorage.setItem("cityManual", 0);
                    $('.cityDistrict').removeClass('d-none');
                    $('#cityManualAll').addClass('d-none');
                    $('#cityManual').addClass('d-none').prop("disabled", true);


                    $('#district').removeClass('d-none').prop("disabled", false);
                    $('#district_chosen').show();
                    $('.cityDistrict').show();
                }
            });

            var cityManual = localStorage.getItem("cityManual");
            if(cityManual=='1'){
                $('#cityManualAll').removeClass('d-none');
                $('#cityManual').removeClass('d-none').prop("disabled", false);
                $('#district').addClass('d-none').prop("disabled", true);
                $('#district_chosen').hide();
                $('.cityDistrict').hide();
                $('#city').val("-1").trigger('chosen:updated');

            }
        });
    </script>
@endpush
