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
            <span>SendNote</span>
        </header>

        <main>@yield('content')</main>

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

        @yield('scripts')
    </body>
</html>