@extends('web.inc.app')
@push('styles')
    <link rel="stylesheet" href="{!! asset("assets/css/modal.css?v=").time() !!}">
    <link rel="stylesheet" href="{!! asset("assets/css/page.css?v=").time() !!}">
    <link rel="stylesheet" href="{!! asset("assets/css/openPosting.css?v=").time() !!}">
@endpush
@php
    $sitemap = $mediapress->data['sitemap'];
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
                @include("web.inc.breadcrumb")
                <div class="pageTitle text-center">
                    <h1>{{strip_tags($sitemap->detail->name)}}</h1>
                </div>
                <div class="pageContent">
                    <div class="text-left textContent text-sm-center mb-4 mb-lg-5">
                        {!! $sitemap->detail->detail !!}
                    </div>
                    <div class="openAdsList">
                        <div class="row">
                            @foreach($categories as $category)
                                @if($category->status==1 && $category->category_page>0)
                                    <div class="cols col-sm-6 col-lg-4">
                                        <div class="item">
                                            <picture>
                                                <img class="lazy cover" src="{{image(\Mediapress\FileManager\Models\MFile::find($category->f_cover))}}" alt="">
                                            </picture>
                                            <div class="text">
                                                @if($category->f_logo)
                                                    <h2><img src="{{image(\Mediapress\FileManager\Models\MFile::find($category->f_logo))}}" alt=""></h2>
                                                @else
                                                    <h2>{{$category->detail->name}}</h2>
                                                @endif
                                                {!! $category->detail->detail !!}
                                                <div class="form-check d-inline-flex align-items-start">
                                                    <input type="checkbox" class="custom-control-input" name="{{slug($category->detail->name)}}Detay" id="{{slug($category->detail->name)}}Detay"  required>
                                                    <label class="custom-control-label" for="{{slug($category->detail->name)}}Detay">
                                                        {!! langPart('Kastamonu Entegre Ağaç San. Tic. A.Ş. tarafından') !!} <a href="javascript:void(0);" class="{{slug($category->detail->name)}}KVKKBtn" role="button" tabindex="-1">{!! langPart('Aydınlatma Metni’nde') !!}</a> {!! langPart('kvkk devam metni') !!}
                                                    </label>
                                                </div>
                                                <a data-url="{!! url($category->details[0]->url) !!}" href="javascript:void(0);" onclick="StartForm({{$category->category_page}},{{$category->id}})" class="d-block mt-3 detailButton page{{$category->category_page}}">
                                                    <i class="fal fa-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="cols col-sm-4">
                                        <div class="item">
                                            <picture>
                                                <img class="lazy cover" src="{{image($category->f_cover)}}" alt="">
                                            </picture>
                                            <div class="text">
                                                @if($category->f_logo)
                                                    <h2><img src="{{image($category->f_logo)}}" alt=""></h2>
                                                @else
                                                    <h2>{{$category->detail->name}}</h2>
                                                @endif
                                                <p>{!! langPart('application.closed','Başvurular kapanmıştır.<br> Yeni açılacak başvurular için bizi takipte kalın.') !!}</p>

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @foreach($categories as $category)
        <div class="modalType" id="{{slug($category->detail->name)}}KVKK" style="display: none;">
            <div class="modalbg"></div>
            <div class="mcmodal">
                <div class="modalTitle">
                    {{ $category->detail->kvkk_title }}
                    <div class="buttonCloses">
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="modalContent">
                    {!! $category->detail->kvkk_text !!}
                </div>
            </div>
        </div>
    @endforeach
    <form class="d-none">
        @csrf
    </form>
@endsection
@push('scripts')
    <script>
        $('.form-check').each(function(){
            $(this).click(function (){
                if ($(this).find('input').prop('checked')) {
                    $(this).parent().parent().find('.detailButton').addClass('active');
                }
                else{
                    $(this).parent().parent().find('.detailButton').removeClass('active');
                }
            });
        });

        @foreach($categories as $category)


        $('.{{slug($category->detail->name)}}KVKKBtn').click(function (){
            $('#{{slug($category->detail->name)}}KVKK').addClass('active');
        });


        @endforeach

        function StartForm(id,category){
            var token = $("input[name=_token]").val();
            $.ajax({
                method: "POST",
                url: '{!! route('application.start') !!}',
                data: {"id": id, "_token": token,"category":category},
                cache: false
            }).fail(function (msg) {
                location.reload();
            }).done(function (data) {
                window.location.href = $('.page'+id).data('url');
            });
        }


    </script>
@endpush
