@extends('frontend.layout.master')
@section('content')
    <div class="container" style="height: auto !important;">
        <div class="blog_inn" style="height: auto !important;">
            <h1 class="main_head">About Us</h1>
            <p class="date_line">Posted By Admin</p>


{{--            <figure id="primaryimage" class="primaryimage">--}}
{{--                <img width="360" height="180" style="    object-fit: contain !important;"--}}
{{--                     src="{{asset('public/assets/images/'.$blog?->image)}}"--}}
{{--                     alt="Introducing Live Donations To Help Support Causes You Care About" importance="high">--}}
{{--            </figure>--}}


            <div class="cnt_box" style="height: auto !important;">
                {!! isset($contact[0]) ? GoogleTranslate::trans($contact[0], session()->get('locale')) : '' !!}
            </div>

            <div class="clear mb15"></div>
        </div>
    </div>
@endsection
