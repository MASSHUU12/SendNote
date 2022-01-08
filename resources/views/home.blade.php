@extends('master') @section('title') Home @endsection @section('content')
<div class="home-container">
    <div class="home-desc-main">
        <h1>A simple and secure way to share notes</h1>
        <h3>
            SendNote is a free online service that allows you to share
            notes/messages securely. The notes you send are encrypted and
            deleted as quickly as possible, whether after a set period of time
            or after a set number of views.
        </h3>
    </div>
    @if($errors->any())
    <div class="home-error-container">
        <div>
            @foreach($errors->all() as $err)
            <h4>{{ $err }}</h4>
            @endforeach
        </div>
    </div>
    @endif
    <div class="home-content">
        <form action="/create" method="post">
            @csrf
            <ul>
                <li>
                    <input
                        type="text"
                        name="title"
                        placeholder="Note title..."
                        value="{{ old('title') }}"
                    />
                </li>
                <li>
                    <label>
                        Expiration date
                        <input
                            type="date"
                            name="expiration_date"
                            value="{{ old('expiration_date') }}"
                        />
                    </label>
                </li>
            </ul>

            <textarea
                name="note_content"
                cols="30"
                rows="10"
                placeholder="Write a note..."
                maxlength="1024"
                >{{ old("note_content") }}</textarea
            >

            {{-- item --}}
            <div class="label-checkbox">
                <label
                    ><input
                        type="checkbox"
                        name="with_password"
                        id="with_password" />
                    <span></span></label
                >Secure with password
            </div>
            <div class="label-hidden" id="label-pass">
                <label for="password"
                    >Enter password to secure the message</label
                >
                <input type="password" name="password" />
                <label for="password_conf">Confirm password</label>
                <input type="password" name="password_conf" />
            </div>

            {{-- item --}}
            <div class="label-checkbox">
                <label>
                    <input
                        type="checkbox"
                        name="with_notification"
                        id="with_notification" />
                    <span></span></label
                >Destruction notification (will be working in the future)
            </div>
            <div class="label-hidden" id="label-notif">
                <label for="email"
                    >Email address to notify when the message is
                    destroyed</label
                >
                <input type="email" name="email" value="{{ old('email') }}" />
                <label for="email_ref"
                    >Reference name for the message (optional)</label
                >
                <input
                    type="text"
                    name="email_ref"
                    value="{{ old('email_ref') }}"
                />
            </div>

            {{-- item --}}
            <div class="label-checkbox">
                <label>
                    <input type="checkbox" name="with_views" id="with_views" />
                    <span></span></label
                >Destroy after number of views
            </div>
            <div class="label-hidden label-hidden-alt" id="label-views">
                <label
                    ><input
                        type="number"
                        name="views"
                        value="{{ old('views') }}"
                    /><span>view/s</span></label
                >
            </div>

            <input type="submit" name="submit" value="Create message" />
        </form>
    </div>
</div>
@endsection @section('scripts')
<script src="{{ asset('js/showOptions.js') }}"></script>
@endsection
