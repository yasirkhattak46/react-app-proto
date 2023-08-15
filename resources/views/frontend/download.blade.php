@extends('frontend.layout.master')
@section('content')
    <div class="container" style="height: auto !important;">
        <div class="cnt_box ac">
            <h1>{{GoogleTranslate::trans($download?->title, session()->get('locale'))}}</h1>
            {!! GoogleTranslate::trans($download?->description, session()->get('locale'))  !!}
        </div>
        <div class="clear mb20"></div>
        @php $downloadlinks = $download->downloads ?  json_decode($download->downloads,true) : null @endphp
        <div class="ac" id="download_data_wrap">
            @forelse($downloadlinks as $link)
                <a class="more_link click-btn" data-url="{{ $link['link'] }}" rel="nofollow"><i
                        class="fa fa-cloud-download fs25" aria-hidden="true"
                        title="Download"></i> {{ GoogleTranslate::trans($link['text'], session()->get('locale')) }}</a>
                <div class="clear mb20"></div>
            @empty
            @endforelse
        </div>
        <div class="clear mb20"></div>

        <div class="clear mb50"></div>
        <div class="cnt_box">
            {!! GoogleTranslate::trans($download?->main_content, session()->get('locale')) !!}
        </div>
    </div>
@endsection

@section('footer-script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".click-btn");
            let countdown;

            function startCountdown(button, url) {
                let seconds = 5;

                countdown = setInterval(function() {
                    button.textContent = `Downloading in ${seconds} sec`;
                    seconds--;

                    if (seconds < 0) {
                        clearInterval(countdown);
                        window.location.href = url;
                    }
                }, 1000);
            }

            buttons.forEach(function(button) {
                button.addEventListener("click", function() {
                    const url = this.getAttribute("data-url");

                    if (!this.disabled) {
                        this.disabled = true;
                        startCountdown(this, url);
                    }
                });
            });
        });
    </script>
@endsection
