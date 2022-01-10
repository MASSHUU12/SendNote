@extends('master') @section('title') @if($status == "secured")
{{ __("This note is password protected") }} @elseif ($status ==
"wrong_password") {{ __("Oh no!") }} @elseif ($status == "good")
{{ $title }}
@endif @endsection @section('content')
<div class="note-container">
    <div class="note-content">
        @if ($status == "secured")
        <h2>{{ __("Attention!") }}</h2>
        <h3>
            {{ __("This note is password protected") }},
            {{ __("please enter your password to read it.") }}
        </h3>
        <form action="/n/{{ $link }}" method="post">
            @csrf
            <input type="password" name="note_password" />
            <input type="submit" value="{{ __('Submit') }}" />
        </form>
        @elseif ($status == "wrong_password")
        <h2>{{ __("Oh no!") }}</h2>
        <h3>{{ __("The password you entered is incorrect.") }}</h3>
        <form action="/n/{{ $link }}" method="post">
            @csrf
            <input type="password" name="note_password" />
            <input type="submit" value="{{ __('Submit') }}" />
        </form>
        @elseif ($status == "good")
        <h1>{{ $title }}</h1>
        <p>{{ $content }}</p>
        @endif
    </div>
</div>
@endsection
