@extends('master') @section('title') Title @endsection @section('content')
<div class="note-container">
    <div class="note-content">
        @if ($status == "secured")
        <h2>Attention!</h2>
        <h3>
            This note is password protected, please enter your password to read
            it.
        </h3>
        <form action="/n/{{ $link }}" method="post">
            @csrf
            <input type="password" name="note_password" />
            <input type="submit" value="Submit" />
        </form>
        @elseif ($status == "wrong_password")
        <h2>Oh no!</h2>
        <h3>The password you entered is incorrect.</h3>
        <form action="/n/{{ $link }}" method="post">
            @csrf
            <input type="password" name="note_password" />
            <input type="submit" value="Submit" />
        </form>
        @elseif ($status == "good")
        <h1>{{ $title }}</h1>
        <p>{{ $content }}</p>
        @endif
    </div>
</div>
@endsection
