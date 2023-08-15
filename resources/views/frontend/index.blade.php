@extends('frontend.layout.master')
@section('content')
    <div class="container">
        <div class="home_banner">
            <div class="hb_txt">
                <h1>{{ GoogleTranslate::trans($hero?->title, session()->get('locale'))}}</h1>
                <h3>{{GoogleTranslate::trans($hero?->sub_title, session()->get('locale'))}}</h3>
                <div class="clear mb30"></div>
                <a class="btn_down"
                   href="{{$hero?->btn_link}}">{{ GoogleTranslate::trans($hero?->btn_text, session()->get('locale'))}}</a>
                <div class="clear mb30"></div>
                <div class="security_info">
                    <strong> {{ GoogleTranslate::trans($hero?->icon_title, session()->get('locale')) }} </strong>
                    <?php $icons = json_decode($hero?->icons, true) ?>
                    @if($icons)
                        <ul>
                            @forelse($icons as $icon)
                                <li>
                                    <img src="{{asset('public/assets/images/'.$icon['image'])}}"
                                         alt="{{$icon['text']}}"/>
                                    <span>{{$icon['text']}}</span>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    @endif
                </div>

                <div class="clear mb30"></div>

                <p>{{GoogleTranslate::trans( $hero?->description, session()->get('locale'))}}</p>

                <div class="clear"></div>
            </div>
            <div class="hb_img">
                <img width="335" height="720" src="{{asset('public/assets/images/'.$hero?->banner)}}"
                     alt=""/>
            </div>
        </div>
        <div class="clear"></div>
        <div class="intro_box">
            <div
                class="group w-full text-gray-800 dark:text-gray-100 border-b border-black/10 dark:border-gray-900/50 bg-gray-50 dark:bg-">
                <div
                    class="text-base gap-4 md:gap-6 md:max-w-2xl lg:max-w-xl xl:max-w-3xl p-4 md:py-6 flex lg:px-0 m-auto">
                    <div class="relative flex w- flex-col gap-1 md:gap-3 lg:w-">
                        <div class="flex flex-grow flex-col gap-3">
                            <div class="min-h- flex flex-col items-start gap-4 whitespace-pre-wrap">
                                <div class="markdown prose w-full break-words dark:prose-invert light">
                                    <h2>{{ GoogleTranslate::trans($feature?->title, session()->get('locale')) }}</h2>
                                    <p> {{GoogleTranslate::trans($feature?->description, session()->get('locale'))}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear mb50"></div>
        <h2 class="feat_head">{{GoogleTranslate::trans($feature?->icons_title, session()->get('locale'))}}</h2>
        <?php $ficons = json_decode($feature?->icons, true) ?>
        <div class="feats_wrap">
            @forelse($ficons as $ficon)
                <div class="fitem">
                    <div class="ficon"><img class="lazyload" width="88" height="88"
                                            src="{{asset('public/assets/images/'.$ficon['image'])}}"
                                            alt=""/></div>
                    <span>{{$ficon['text']}}</span>
                </div>
            @empty
            @endforelse
        </div>
        <div class="clear mb50"></div>
        <?php $color_contents = isset($multiSec->color_content) ? json_decode($multiSec->color_content, true) : null ?>
        @forelse($color_contents as $color_content)
            <div class="hinfo_box hinfo_box4 one">
                <h2>{{GoogleTranslate::trans($color_content['title'], session()->get('locale'))}}</h2>
                <div
                    class="group w-full text-gray-800 dark:text-gray-100 border-b border-black/10 dark:border-gray-900/50 bg-gray-50 dark:bg-[#444654]">
                    <div
                        class="text-base gap-4 md:gap-6 md:max-w-2xl lg:max-w-xl xl:max-w-3xl p-4 md:py-6 flex lg:px-0 m-auto">
                        <div class="relative flex w-[calc(100%-50px)] flex-col gap-1 md:gap-3 lg:w-[calc(100%-115px)]">
                            <div class="flex flex-grow flex-col gap-3">
                                <div class="min-h-[20px] flex flex-col items-start gap-4 whitespace-pre-wrap">
                                    <div class="markdown prose w-full break-words dark:prose-invert light">
                                        <p>{{GoogleTranslate::trans($color_content['description'], session()->get('locale'))}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="__image">
                    <img style="height: auto; width: auto" width="500" height="500" class="lazyload hwa"
                         src="{{asset('public/assets/images/'.$color_content['image'])}}"
                         alt="">
                </div>
            </div>
            <div class="clear mb50"></div>
        @empty
        @endforelse
        <?php $faqs = isset($multiSec->faqs) ? json_decode($multiSec->faqs, true) : null ?>
    </div>
    <div class="faqs_box" style="height: auto !important;">
        <div class="container"><h2>{{GoogleTranslate::trans($multiSec?->faq_title, session()->get('locale'))}}</h2>
            @forelse($faqs  as $key => $faq)
                <div class="faq-list">
                    <div class="bl-title">
                        <span>{{$key+1}}</span>
                        <font>{{GoogleTranslate::trans($faq['question'], session()->get('locale'))}}</font>
                    </div>
                    <div class="bl-content">
                        <div class="bl-text">
                            <div class="triangle-left"></div>
                            <div class="answ">
                                <div class="answ-wrap">
                                    <div>{{GoogleTranslate::trans($faq['answer'], session()->get('locale'))}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear mb50"></div>
    <div class="container">
        <div class="blog_wrap">
            @forelse($blogs as $blog)
                <a class="blog_item" href="blog/{{$blog->slug}}">
                    <div class="bl_content">
                        <div class="bl_title">{{GoogleTranslate::trans($blog->title, session()->get('locale'))}}</div>
                        <div class="bl_text">{{Str::limit(GoogleTranslate::trans($blog->description, session()->get('locale')), 330)}}
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

            <div class="ac"><a class="more_link" href="{{url('/blogs')}}">Show More Blog</a></div>
        </div>
    </div>
    <div class="clear mb50"></div>
    <div class="hart_box">
        <div class="container">
            <div class="ac"><img width="320" height="320"
                                 src="{{asset('public/assets/images/'.$homeVideo->image)}}"
                                 alt=""/></div>
            <div class="clear mb30"></div>

            <div class="cnt_box" style="height: auto !important;">
                <div
                    class="group w-full text-gray-800 dark:text-gray-100 border-b border-black/10 dark:border-gray-900/50 bg-gray-50 dark:bg- sm:AIPRM__conversation__response"
                    style="height: auto !important;">
                    <div
                        class="flex p-4 gap-4 text-base md:gap-6 md:max-w-2xl lg:max-w-xl xl:max-w-3xl md:py-6 lg:px-0 m-auto"
                        style="height: auto !important;">
                        <div class="relative flex w- flex-col gap-1 md:gap-3 lg:w-" style="height: auto !important;">
                            <div class="flex flex-grow flex-col gap-3" style="height: auto !important;">
                                <div class="min-h- flex flex-col items-start gap-4 whitespace-pre-wrap break-words"
                                     style="height: auto !important;">
                                    <div
                                        class="markdown prose w-full break-words dark:prose-invert light AIPRM__conversation__response"
                                        style="height: auto !important;">
                                        <p>{{GoogleTranslate::trans($homeVideo?->description, session()->get('locale'))}}</p>
                                        <div class="clear mb30"></div>
                                        <div class="ac full clear" style="height: auto !important;">
                                            <div class="embed" style="height: auto !important;">
                                                <div class="youtube_embed" data-embed="{{$homeVideo?->video_id}}"
                                                     style="height: auto !important;">
                                                    <div class="youtube" id="{{$homeVideo?->video_id}}"
                                                         src="{{asset('public/assets/images/'.$homeVideo?->thumbnail)}}"
                                                         style="width:100%; height:100%;"></div>
                                                </div>
                                            </div>
                                        </div>

                                        {!! GoogleTranslate::trans($homeVideo->content, session()->get('locale')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
