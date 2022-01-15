@extends('master') @section('title')
{{ __("Result") }}
@endsection @section('content')
<div class="result-container">
    <div class="result-content">
        @if (session("status") == "successful")
        <h1>{{ __("Send the link to the person you want them to see it") }}</h1>
        <span id="text_copy">{{ session("link") }}</span>
        <button id="btn_copy">{{ __("Copy link to clipboard") }}</button>
        @else
        <h1>{{ __("There is nothing to see here right now") }}</h1>
        <p>{{ __("First, go to the home page and create a note there.") }}</p>
        <a href="/" class="result-btn">{{ __("Return Home") }}</a>
        @endif
        <p>
            {{ __("If you") }} &#9825; {{ __("my site you can support me") }}
            <a href="#">{{ __("here") }}</a
            >.
        </p>
    </div>
</div>
@endsection @section('scripts')
<script src="{{ asset('js/copyText.js') }}"></script>
@endsection
