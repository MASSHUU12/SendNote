@extends('master') @section('title')
{{ __("Result") }}
@endsection @section('content')
<div class="result-container">
    <div class="result-content">
        @if (session("status") == "successful")
        <h1>{{ __("Send the link to the person you want them to see it") }}</h1>
        <span id="text_copy">{{ session("link") }}</span>
        <button id="btn_copy">{{ __("Copy link to clipboard") }}</button>
        <div class="deletion-container">
            <h2>{{__('If necessary, you can delete the created note right away.')}}</h4>
            <h3>
                {{__('This option will no longer be available when you leave this page.')}}
            </h3>
            <form action="/delete" method="post" id="deletion-form">
                @method('DELETE')
                <input type="hidden" name="deletion_link" value="{{ session('link') }}">
                @csrf
                <input type="submit" value="{{__('DELETE')}}" name="submit">
            </form>
        </div>
        @elseif (session("status") == "deleted_successfully")
        <h1>{{__('Deleted successfully')}}</h1>
        <p>{{__('Your note has been deleted successfully, go to the home page to create a new one.')}}</p>
        <a href="/" class="result-btn">{{ __("Return Home") }}</a>
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
