@section('header')

    <header class="header miniHeader">
        <div class="container-fluid">
            <div class="allHeader">
                <div class="logo">
                    <a href="/{{$mediapress->activeLanguage->code}}">
                        <img src="{{asset('assets/img/logo.svg')}}" alt="">
                    </a>
                </div>
                <div class="homeBtn">
                    <a href="/{{$mediapress->activeLanguage->code}}">
                        <i class="fal fa-home-lg-alt"></i> {!! langPart('home.prev','Anasayfaya Git') !!}
                    </a>
                </div>
            </div>
        </div>
    </header>

@endsection
