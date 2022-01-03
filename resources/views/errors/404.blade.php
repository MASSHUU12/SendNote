@extends('master') @section('title') 404 @endsection @section('content')
<div class="error-container">
    <div class="error-content">
        <h1><span>404</span> - Looks like you're lost.</h1>
        <p>
            Well, this is awkward. Maybe this page used to exists or you just
            spelled something wrong.
        </p>
        <a href="/">Return Home</a>
    </div>
</div>
@endsection
