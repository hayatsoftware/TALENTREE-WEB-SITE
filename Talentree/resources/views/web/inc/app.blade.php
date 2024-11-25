@extends('mediapress::main')
@prepend('bodyClass', '"body"')
@prepend('styles')
    <link rel="shortcut icon" href="{!! asset("assets/img/favicon.ico") !!}" />
    <link rel="stylesheet" href="{!! asset("assets/css/bootstrap.min.css") !!}" />
    <link rel="stylesheet" href="{!! asset("assets/css/header.css?v=").time() !!}" />
    <link rel="stylesheet" href="{!! asset("assets/css/footer.css?v=").time() !!}" />
    <link rel="stylesheet" href="{!! asset("assets/css/global.css?v=").time() !!}" />
    <link rel="stylesheet" href="{!! asset("assets/css/newCookie.css?v=").time() !!}" />
    <link href="{!! asset("assets/libs/fontawesome/css/all.min.css?v=").time() !!}" rel="stylesheet">
    <style>

        .mcPopup .modal-content .modal-body {
            font-family: 'Manrope-Regular' !important;
        }
    </style>
@endprepend
@if($mediapress->url->model_type=='Mediapress\Modules\Content\Models\CategoryDetail')
    @include("web.inc.headerApp")
@else
    @include("web.inc.header")
@endif
@include("web.inc.footer")
@prepend('scripts')
    <script src="{!! asset("assets/js/jquery-3.7.1.min.js") !!}"></script>
    <script src="{!! asset("assets/js/bootstrap.min.js") !!}"></script>
    <script src="{!! asset("assets/js/lazyload.js") !!}"></script>
    <script src="{!! asset("assets/js/cookieconsent.js") !!}"></script>
    <script src="{!! asset("assets/js/talentree.js?v=").time() !!}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            cookieconsent.run({"notice_banner_type":"simple","consent_type":"express","palette":"dark","language":"tr","page_load_consent_levels":["strictly-necessary"],"notice_banner_reject_button_hide":false,"preferences_center_close_button_hide":false,"page_refresh_confirmation_buttons":false,"website_name":"MC","website_privacy_policy_url":"/tr_tr/sayfa/cerezlere-iliskin-aydinlatma-metni"});
        });
    </script>

    <script type="text/plain" cookie-consent="tracking">
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','G-JW03LE6XZW');
    </script>

    <script>
        $(document).delegate(".cc-nb-okagree", "click", function(){
            $('input[name=functionality]').prop("checked", true);
            $('input[name=tracking]').prop("checked", true);
            $('input[name=targeting]').prop("checked", true);

            $('#title_functionality').parent().remove();
            $('#title_functionality').remove();

        });

        $(document).delegate(".cc-cp-foot-save", "click", function(){
            $('input[name=functionality]').prop("checked", true);
            $('input[name=tracking]').prop("checked", true);
            $('input[name=targeting]').prop("checked", true);
            $('.cc-nb-okagree').trigger('click');
        });

        $(document).delegate(".cc-nb-changep", "click", function(){

            /*$('input[name=functionality]').prop("checked", true);
            $('input[name=tracking]').prop("checked", true);
            $('input[name=targeting]').prop("checked", true);*/
            $('#title_functionality').parent().remove();
            $('#title_functionality').remove();
            $('#title_more_information').parent().remove();
            $('#content_more_information').remove();

            $('input[name=functionality]').change(function (){
                if (this.checked) {
                    $('input[name=functionality]').prop("checked", true);
                    $('#functionality_label').text('{{ strip_tags(langPartAttr('cookieActiveText', " Etkin")) }}');
                }
                else{
                    $('input[name=functionality]').prop("checked", false);
                    $('#functionality_label').text('{{ strip_tags(langPartAttr('cookieActiveNoneText', " Etkin Değil")) }}');
                }
            });
            $('#functionality_label').text('{{ strip_tags(langPartAttr('cookieActiveNoneText', " Etkin Değil")) }}');


            $('input[name=tracking]').change(function (){
                if (this.checked) {
                    $('input[name=tracking]').prop("checked", true);
                    $('#tracking_label').text('{{ strip_tags(langPartAttr('cookieActiveText', " Etkin")) }}');
                }
                else{
                    $('input[name=tracking]').prop("checked", false);
                    $('#tracking_label').text('{{ strip_tags(langPartAttr('cookieActiveNoneText', " Etkin Değil")) }}');
                }
            });
            $('#tracking_label').text('{{ strip_tags(langPartAttr('cookieActiveNoneText', " Etkin Değil")) }}');

            $('input[name=targeting]').change(function (){
                if (this.checked) {
                    $('input[name=targeting]').prop("checked", true);
                    $('#targeting_label').text('{{ strip_tags(langPartAttr('cookieActiveText', " Etkin")) }}');
                }
                else{
                    $('input[name=targeting]').prop("checked", false);
                    $('#targeting_label').text('{{ strip_tags(langPartAttr('cookieActiveNoneText', " Etkin Değil")) }}');
                }
            });
            $('#targeting_label').text('{{ strip_tags(langPartAttr('cookieActiveNoneText', " Etkin Değil")) }}');

            $('#cc-pc-head-title-headline').text('{{ strip_tags(langPartAttr('cookieCenter', " Çerez Tercihleri Merkezi")) }}');
            $('.cc-cp-foot-save').text('{{ strip_tags(langPartAttr('cookieSavePreferences', " Tercihleri Kaydet")) }}');

            $('.cc-cp-foot-byline').remove();


            $('#title_your_privacy').text('{{ strip_tags(langPartAttr('cookiePrivacyTitle', " Gizliliğiniz")) }}');
            $('#title_strictly-necessary').text('{{ strip_tags(langPartAttr('cookieRequieredTitle', " Zorunlu Çerezler")) }}');
            $('#title_functionality').text('{{ strip_tags(langPartAttr('cookieFunctionalTitle', " İşlevsel Çerezler")) }}');
            $('#title_tracking').text('{{ strip_tags(langPartAttr('cookiePerformanceTitle', " Performans Çerezleri")) }}');
            $('#title_targeting').text('{{ strip_tags(langPartAttr('cookieAdvertisingTitle', " Reklam/Pazarlama Çerezleri")) }}');

            $('#content_your_privacy .cc-cp-body-content-entry-title').text('{{ strip_tags(langPartAttr('cookiePrivacyTitle', " Gizliliğiniz")) }}');
            $('#content_your_privacy .cc-cp-body-content-entry-text').hide();
            $('#content_your_privacy .cc-cp-body-content-entry-text:nth-child(2)').show();
            $('#content_your_privacy .cc-cp-body-content-entry-text').text('');
            $('#content_your_privacy .cc-cp-body-content-entry-text').html('<a style="text-decoration:none !important;" href="{{ strip_tags(langPartAttr('cookieTextNewLink', " Çerez Politikası Link")) }}">{{ strip_tags(langPartAttr('cookieText', " Çerez Politikası")) }}</a>');

            $('#content_strictly-necessary .cc-cp-body-content-entry-title').text('{{ strip_tags(langPartAttr('cookieRequieredTitle', " Zorunlu Çerezler")) }}');
            $('#content_strictly-necessary .cc-cp-body-content-entry-text').hide();
            $('#content_strictly-necessary .cc-cp-body-content-entry-text:nth-child(2)').show();
            $('#content_strictly-necessary .cc-cp-body-content-entry-text').text('{{ strip_tags(langPartAttr('cookieRequieredContent', " Zorunlu Çerezler")) }}');
            $('#content_strictly-necessary #strictly-necessary_label').text('{{ strip_tags(langPartAttr('cookieAllActive', " Her zaman etkin")) }}');

            $('#content_functionality .cc-cp-body-content-entry-title').text('{{ strip_tags(langPartAttr('cookieFunctionalTitle', " İşlevsel Çerezler")) }}');
            $('#content_functionality .cc-cp-body-content-entry-text').hide();
            $('#content_functionality .cc-cp-body-content-entry-text:nth-child(2)').show();
            $('#content_functionality .cc-cp-body-content-entry-text').text('{{ strip_tags(langPartAttr('cookieFunctionalContent', " İşlevsel Çerezler")) }}');

            $('#content_tracking .cc-cp-body-content-entry-title').text('{{ strip_tags(langPartAttr('cookiePerformanceTitle', " Performans Çerezleri")) }}');
            $('#content_tracking .cc-cp-body-content-entry-text').hide();
            $('#content_tracking .cc-cp-body-content-entry-text:nth-child(2)').show();
            $('#content_tracking .cc-cp-body-content-entry-text').text('{{ strip_tags(langPartAttr('cookiePerformanceContent', " Performans Çerezleri")) }}');

            $('#content_targeting .cc-cp-body-content-entry-title').text('{{ strip_tags(langPartAttr('cookieAdvertisingTitle', " Reklam/Pazarlama Çerezleri")) }}');
            $('#content_targeting .cc-cp-body-content-entry-text').hide();
            $('#content_targeting .cc-cp-body-content-entry-text:nth-child(2)').show();
            $('#content_targeting .cc-cp-body-content-entry-text').text('{{ strip_tags(langPartAttr('cookieAdvertisingContent', " Reklam/Pazarlama Çerezleri")) }}');


        });

        setTimeout(function (){
            $('#cc-nb-title').text('çerez başlık');
            $('#cc-nb-text').text('');
            $('#cc-nb-text').html('<a href="{!! strip_tags(LangPart('cookieTextNewLink', 'Çerez Politikası Link')) !!}">{!! strip_tags(LangPart('cookieText', 'Çerez Politikası')) !!}</a>');

            $('.cc-nb-okagree').text('{{ strip_tags(langPartAttr('cookieAllChecks', " Tümünü Kabul Et")) }}');
            $('.cc-nb-reject').text('{{ strip_tags(langPartAttr('cookieAllNone', " Tümünü Reddet")) }}');
            $('.cc-nb-changep').text('{{ strip_tags(langPartAttr('cookieOptions', " Çerez Ayarları")) }}');
        },200);
    </script>
@endprepend
