<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Lorem ipsum" />
        <meta
            name="og:title"
            property="og:title"
            content="SendNote - send notes anonymously"
        />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <title>SendNote | @yield('title')</title>
    </head>
    <body>
        <header>
            <a href="/">SendNote</a>
        </header>

        <main>@yield('content')</main>

        <footer>
            <div class="footer-left">
                <div class="footer-left-content">
                    <h3>{{ __("Main") }}</h3>
                    <a href="/">Home</a>
                    <a href="/privacy">{{ __("Privacy Policy") }}</a>
                    <a href="/cookie">{{ __("Cookie Policy") }}</a>
                </div>
                <div class="footer-left-content">
                    <h3>{{ __("Other services") }}</h3>
                    <a href="#">Cut.It - {{ __("URL Shortener") }}</a>
                    <a href="https://jakubdev.vxm.pl" target="_blank"
                        >KolobrzegHotele</a
                    >
                </div>
            </div>
            <div class="footer-right">
                <p>
                    {{ __("This if free online service - made with") }} &#9825;.
                    {{ __("You can support website") }}
                    <a href="">{{ __("here") }}</a
                    >.
                </p>
                <div class="footer-lang">
                    <a href="/language/pl" rel="nofollow">
                        <span
                            class="iconify"
                            data-icon="twemoji:flag-for-flag-poland"
                            data-width="38"
                        ></span>
                    </a>
                    <a href="/language/en" rel="nofollow">
                        <span
                            class="iconify"
                            data-icon="twemoji:flag-for-flag-united-states"
                            data-width="38"
                        ></span>
                    </a>
                </div>
            </div>
        </footer>

        <div class="c-container" id="c-container">
            <div class="c-top">
                <span
                    class="iconify"
                    data-icon="ci:cookie"
                    data-width="64"
                ></span>
                <p>
                    {{ __("We use") }}
                    <a href="/cookie">{{ __("cookies") }}</a>
                    {{ __("to make your experience better") }}
                </p>
            </div>
            <div class="c-btm">
                <button id="c-btn">OK</button>
            </div>
        </div>

        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
            integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.1.0/iconify.min.js"
            integrity="sha512-m+FSPcVQiYajBX0nqua3ZtlcMokGwe8cXl7JBQ51xYO+E9aMJm+vlbxnbLuhrDcezHB67T6gK0YuGwuXfl+yrg=="
            crossorigin="anonymous"
        ></script>

        <script src="{{ asset('js/detectLocale.js') }}"></script>
        <script src="{{ asset('js/cConsent.js') }}"></script>
        @yield('scripts')
    </body>
</html>
