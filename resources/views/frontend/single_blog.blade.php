@extends('frontend.layout.master')
@section('content')
    <div class="container" style="height: auto !important;">
        <div class="blog_inn" style="height: auto !important;">
            <h1 class="main_head">{{GoogleTranslate::trans($blog?->title, session()->get('locale'))}}</h1>
            <p class="date_line">{{$blog?->updated_at->format('j F Y')}}</p>


            <figure id="primaryimage" class="primaryimage">
                <img width="360" height="180" style="    object-fit: contain !important;"
                     src="{{asset('public/assets/images/'.$blog?->image)}}"
                     alt="Introducing Live Donations To Help Support Causes You Care About" importance="high">
            </figure>


            <div class="cnt_box" style="height: auto !important;">
                {!! GoogleTranslate::trans($blog?->main_content, session()->get('locale')) !!}
            </div>

            <div class="clear mb15"></div>
            <div class="social_sharer">
                <span id="share_facebook" onclick="share_this('share_facebook')" class="ss_btn facebook"
                      data-url="https://instander.com/blog/introducing-live-donations-to-help-support-causes-you-care-about/"
                      data-title="Introducing Live Donations to Help Support Causes You Care About"><i
                        aria-hidden="true" title="Share on Facebook" class="fa fa-facebook"></i></span>

                <span id="share_twitter" onclick="share_this('share_twitter')" class="ss_btn twitter"
                      data-url="https://instander.com/blog/introducing-live-donations-to-help-support-causes-you-care-about/"
                      data-title="Introducing Live Donations to Help Support Causes You Care About"><i
                        aria-hidden="true" title="Share on Twitter" class="fa fa-twitter"></i></span>

                <span id="share_reddit" onclick="share_this('share_reddit')" class="ss_btn reddit"
                      data-url="https://instander.com/blog/introducing-live-donations-to-help-support-causes-you-care-about/"
                      data-title="Introducing Live Donations to Help Support Causes You Care About"><i
                        aria-hidden="true" title="Share on Reddit" class="fa fa-reddit"></i></span>

                <span id="share_pinterest" onclick="share_this('share_pinterest')" class="ss_btn pinterest"
                      data-url="https://instander.com/blog/introducing-live-donations-to-help-support-causes-you-care-about/"
                      data-title="Introducing Live Donations to Help Support Causes You Care About"><i
                        aria-hidden="true" title="Share on Pinterest" class="fa fa-pinterest"></i></span>

                <a rel="nofollow" id="share_whatsapp" class="ss_btn whatsapp" target="_blank"
                   href="https://api.whatsapp.com/send?text=Introducing+Live+Donations+to+Help+Support+Causes+You+Care+Abouthttps%3A%2F%2Finstander.com%2Fblog%2Fintroducing-live-donations-to-help-support-causes-you-care-about%2F"><i
                        aria-hidden="true" title="Share on Whatsapp" class="fa fa-whatsapp"></i></a>
            </div>
        </div>


        <div class="clear mb50"></div>
        <h2>Recommended For You</h2>
        <div class="blog_wrap">
            @forelse($blogs as $blog)
                <a class="blog_item" href="blog/{{$blog->slug}}">
                    <div class="bl_content">
                        <div class="bl_title">{{GoogleTranslate::trans($blog->title, session()->get('locale'))}}</div>
                        <div class="bl_text"> {{Str::limit(GoogleTranslate::trans($blog->description, session()->get('locale')), 330)}}
                        </div>
                    </div>
                    <div class="bl_img">
                        <img width="275" height="175" class="hwa ls-is-cached lazyloaded"
                             src="{{asset('public/assets/images/'.$blog->image)}}"
                             data-src="{{asset('public/assets/images/'.$blog->image)}}"
                             alt="{{$blog->title}}">
                    </div>
                </a>
            @empty
            @endforelse
    </div>
    </div>
@endsection
