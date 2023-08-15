@extends('frontend.layout.master')
@section('content')
    <div class="container">
        <div class="cnt_box">
            <h1>{{GoogleTranslate::trans('Latest Blogs', session()->get('locale'))}}</h1>
        </div>
        <div id="main_list_item" class="blog_wrap">
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
        <div class="clear mb20"></div>
    </div>
@endsection
