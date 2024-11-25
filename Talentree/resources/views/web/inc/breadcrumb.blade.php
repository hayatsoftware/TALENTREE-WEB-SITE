@php
    if (isset($mediapress->data["breadcrumb"])){
        $breadcrumb = $mediapress->data["breadcrumb"];
    }else{
        $breadcrumb = $mediapress->breadcrumb();
    }
@endphp
<div class="breadcrumb">
    <ul>
        @foreach($breadcrumb as $data)
            <li><a href="{{strip_tags($data['url'])}} ">{{strip_tags($data['name'])}}</a></li>
        @endforeach
    </ul>
</div>
