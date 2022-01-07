@extends('master') @section('title')
{{ __("Result") }}
@endsection @section('content')
<div class="result-container">
    <div class="result-content">
        @if (session("status") == "successful")
        <h1>Send the link to whom you want to view</h1>
        <span>{{ session("link") }}</span>
        <button>Copy link to clipboard</button>
        @else
        <h1>There is nothing to see here right now</h1>
        <p>First, go to the home page and create a note there.</p>
        <a href="/" class="result-btn">Return Home</a>
        @endif
        <p>If you &#9825; my site you can support me <a href="#">here</a>.</p>
    </div>
</div>
@endsection
