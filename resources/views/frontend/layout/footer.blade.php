<div class="clear"></div>

<footer>
    <div class="footer_top">
        <div class="container">
            <div class="ftr_links mb15">
                <a href="{{url('/about-us')}}">About Us</a><a
                    href="{{url('/privacy-policy')}}">Privacy Policy</a><a
                    href="{{url('/contact-us')}}">Contact</a></div>
            <p class="mb0">Contact Us : {{isset($settings->email) ? $settings->email : ''}}</p>
        </div>
    </div>
    <div class="footer_bottom">
        <p class="mb0">Copyright © instander.com All rights reserved </p>
    </div>
    <script type="text/javascript" src="{{asset('public/frontend/assets/youtube.js')}}"></script>
</footer>
<span onClick="topFunction()" id="ScrollToTop" aria-label="Go to top" title="Go to top"><i
        class="fa fa-angle-up"></i></span>

<script>

    document.documentElement.style.setProperty('--primary-color', "{{$settings?->primary_color}}");
    document.documentElement.style.setProperty('--secondary-color', "{{$settings?->secondary_color}}");

    function show_menu_mob() {
        document.getElementById("nav_wrap").className += 'show_mob_menu';
    }

    function hide_menu_mob() {
        document.getElementById("nav_wrap").className = '';
    }

    var ScrollButton = document.getElementById("ScrollToTop");
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (window.pageYOffset > 20) {
            ScrollButton.style.display = "block";
        } else {
            ScrollButton.style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollIntoView({
            behavior: "smooth"
        });
    }

    function scrollToi(id) {
        this.event.preventDefault();
        const yOffset = 0;
        const element = document.getElementById(id);
        const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;
        window.scrollTo({
            top: y,
            behavior: 'smooth'
        });
    }

    function scrollToc(to_id) {
        this.event.preventDefault();
        var element = document.getElementById(to_id);
        element.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
        setTimeout(function () {
            window.location.hash = to_id;
        }, 100);
    }

    function share_this(elem) {
        var url = document.getElementById(elem).getAttribute('data-url');
        var title = document.getElementById(elem).getAttribute('data-title');
        var pop_url = '';
        if (elem == 'share_facebook') {
            pop_url = 'https://www.facebook.com/sharer/sharer.php?u=' + url;
        } else if (elem == 'share_twitter') {
            pop_url = 'https://twitter.com/intent/tweet?text=' + title + '&url=' + url;
        } else if (elem == 'share_reddit') {
            pop_url = 'http://www.reddit.com/submit?url=' + url + '&title=' + title;
        } else if (elem == 'share_pinterest') {
            pop_url = 'http://www.pinterest.com/pin/create/button/?url=' + url + '&description=' + title;
        }

        window.open(pop_url, "PopupWindow", "width=500,height=500,scrollbars=yes,resizable=no");
    }
</script>
{!! $settings->footer_script !!}
